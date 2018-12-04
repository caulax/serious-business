<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Repository\GoodRepository;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Good;
use FOS\RestBundle\View\View;

/**
 * Class GoodController
 * @package AppBundle\Controller
 *
 * @RouteResource("Good")
 */
class GoodController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Gets good by id
     *
     * @param int $id
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @Security("has_role('ROLE_PROVIDER') or has_role('ROLE_MANAGER')")
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
        $good = $this->getGoodRepository()->findGoodQuery($id)->getOneOrNullResult();
        if ($good === null) {
            return new Response(sprintf('Dont exist good with id %s', $id),Response::HTTP_NOT_FOUND);
        }
        return $good;
    }

    /**
    * Gets a collection of goods
    * @Security("has_role('ROLE_PROVIDER') or has_role('ROLE_MANAGER')")
    * @return array
    *
    **/
    public function cgetAction() {
        return $this->getGoodRepository()->findAllQuery()->getResult();
    }

    /**
     * @param Request $request
     * @Security("has_role('ROLE_PROVIDER')")
     * @return array
     */
    public function postAction(Request $request)
    {

        $em = $this->get('doctrine')->getManager();

        $name=$request->request->get('name');
        $price=$request->request->get('price');
        $amount=$request->request->get('amount');

        $good=new Good();
        $good->setName($name);
        $good->setPrice($price);
        $good->setAmount($amount);


        $em->persist($good);
        $em->flush();
        return $this->getGoodRepository()->findGoodQuery($good->getId())->getResult();
    }

    /**
     * @param Request $request
     * @param $id
     * @return array|Response
     * @Security("has_role('ROLE_PROVIDER')")
     */
    public function patchAction(Request $request, $id)
    {
        $em = $this->get('doctrine')->getManager();

        $good = $this->getGoodRepository()->find($id);

        if ($good === null) {
            return new Response(sprintf('Dont exist good with id %s', $id), Response::HTTP_NOT_FOUND);
        }

        $name=$request->request->get('name');
        $price=$request->request->get('price');
        $amount=$request->request->get('amount');

        if ($name) {
            $good->setName($name);
        }

        if ($price) {
            $good->setPrice($price);
        }

        if ($amount) {
            $good->setAmount($amount);
        }

        $em->persist($good);
        $em->flush();
        return $this->getGoodRepository()->findGoodQuery($good->getId())->getResult();
    }


    /**
     * Delete a key
     * @param int $id
     * @return View
     * @Security("has_role('ROLE_PROVIDER')")
     *
     * @ApiDoc(
     *     statusCodes={
     *         204 = "Returned when an existing key has been successful deleted",
     *         404 = "Return when not found"
     *     }
     * )
     */
    public function deleteAction($id)
    {
        $key = $this->getGoodRepository()->deleteQuery($id)->getResult();
        if ($key == 0) {
            return new View("This id $id doesnt exist", Response::HTTP_NOT_FOUND);
        }
        return new View("Deleted good $id");
    }

    /**
     * @return GoodRepository
     */
    private function getGoodRepository()
    {
        return $this->get('crv.doctrine_entity_repository.good');
    }
}
