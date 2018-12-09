<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Repository\OrderRepository;
use AppBundle\Entity\Repository\GoodRepository;
use AppBundle\Entity\OrderGoods;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Order;
use FOS\RestBundle\View\View;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GoodController
 * @package AppBundle\Controller
 *
 * @RouteResource("Order")
 */
class OrderController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Gets good by id
     *
     * @param int $id
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @Security("has_role('ROLE_MANAGER') or has_role('ROLE_DIRECTOR')")
     * @ApiDoc(
     *     output="AppBundle\Entity\Good",
     *     statusCodes={
     *         200 = "Returned when successful",
     *         404 = "Return when not found"
     *     }
     * )
     */
    public function getAction($id)
    {
        $good = $this->getOrderRepository()->find($id);
        if ($good === null) {
            return new Response(sprintf('Dont exist good with id %s', $id),Response::HTTP_NOT_FOUND);
        }
        return $good;
    }

    /**
     * Gets a collection of goods
     * @Security("has_role('ROLE_MANAGER') or has_role('ROLE_DIRECTOR')")
     * @return array
     *
     **/
    public function cgetAction() {
        return $this->getOrderRepository()->findAll();
    }

    /**
     * @param Request $request
     * @Security("has_role('ROLE_MANAGER')")
     * @return array
     */
    public function postAction(Request $request)
    {
        $em = $this->get('doctrine')->getManager();

        $usr = $this->getUser();

        $order = new Order();
        $order->setUser($usr->getId());
        $order->setStatus('created');

        $em->persist($order);
        $em->flush();
        return $this->getOrderRepository()->findGoodQuery($order->getId())->getResult();
    }

    /**
     * @param Request $request
     * @param $id
     * @return array|Response
     * @Security("has_role('ROLE_MANAGER')")
     */
    public function patchAction(Request $request, $id) {
        $em = $this->get('doctrine')->getManager();

        $id_goods = $request->request->get('goods');

        $order = $this->getOrderRepository()->find($id);

        foreach ($id_goods as $id_g) {
            $good = $this->getGoodRepository()->find($id_g);

            if ($good === null) {
                return new Response(sprintf('Dont exist good with id %s', $id_g), Response::HTTP_NOT_FOUND);
            }

            $order->setGoods($good);

            $em->persist($order);
            $em->flush($order);

        }
        return new Response(sprintf('All goods are added to Order %s', $id));
    }

    /**
     * @param Request $request
     * @param $id
     * @param $good_id
     * @return array|Response
     * @Security("has_role('ROLE_MANAGER')")
     */
    public function deleteGoodAction(Request $request, $id, $good_id) {
        $em = $this->get('doctrine')->getManager();

        $order = $this->getOrderRepository()->find($id);
        $good = $this->getGoodRepository()->find($good_id);

        $order->removeGood($good);

        $em->persist($order);
        $em->flush($order);

        return new Response(sprintf('Good %s are deleted from Order %s', $good_id, $id));

    }

    /**
     * @return OrderRepository
     */
    private function getOrderRepository() {
        return $this->get('crv.doctrine_entity_repository.order');
    }


    /**
     * @return GoodsRepository
     */
    private function getGoodRepository() {
        return $this->get('crv.doctrine_entity_repository.good');
    }
}
