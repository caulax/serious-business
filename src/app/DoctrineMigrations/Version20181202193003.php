<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20181202193003 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql("insert into good (name, price, amount) values ('Hydrochlorothiazide', 18, 47);
insert into good (name, price, amount) values ('Sertraline Hydrochloride', 48, 23);
insert into good (name, price, amount) values ('Mixture of Twenty-Two Standardized and Non-Standardized Grasses', 26, 63);
insert into good (name, price, amount) values ('Solbar Shield SPF40', 89, 50);
insert into good (name, price, amount) values ('Common Sagebrush', 42, 19);
insert into good (name, price, amount) values ('SKELAXIN', 50, 32);
insert into good (name, price, amount) values ('Ampicillin and Sulbactam', 99, 12);
insert into good (name, price, amount) values ('Acyclovir', 21, 20);
insert into good (name, price, amount) values ('nystatin', 5, 11);
insert into good (name, price, amount) values ('Creamy Diaper Rash', 1, 35);
insert into good (name, price, amount) values ('Benztropine Mesylate', 89, 92);
insert into good (name, price, amount) values ('Chlordiazepoxide Hydrochloride', 100, 45);
insert into good (name, price, amount) values ('Fenofibric Acid', 35, 56);
insert into good (name, price, amount) values ('Salsalate', 75, 47);
insert into good (name, price, amount) values ('dextroamphetamine sulfate', 78, 97);
insert into good (name, price, amount) values ('Miracet', 42, 42);
insert into good (name, price, amount) values ('BABY DIAPER', 93, 14);
insert into good (name, price, amount) values ('leader tussin dm', 61, 60);
insert into good (name, price, amount) values ('DIORSKIN NUDE TAN BB CREME HEALTHY GLOW SKIN-PERFECTING BEAUTY BALM SUNSCREEN BROAD SPECTRUM SPF15 Tint 2', 28, 3);
insert into good (name, price, amount) values ('The Cover Classic Soft Foundation', 76, 80);
insert into good (name, price, amount) values ('Hemorrhoidal', 11, 90);
insert into good (name, price, amount) values ('Cough and Cold', 88, 72);
insert into good (name, price, amount) values ('Mirtazapine', 44, 16);
insert into good (name, price, amount) values ('Dolce and Gabbana The Lift Foundation Beige 78', 11, 75);
insert into good (name, price, amount) values ('Equaline tussin cough and chest congestion', 69, 70);
insert into good (name, price, amount) values ('Agnus castus e sem. 4', 71, 87);
insert into good (name, price, amount) values ('REZIL', 10, 34);
insert into good (name, price, amount) values ('Suntone', 74, 18);
insert into good (name, price, amount) values ('Ulta Vanilla Sugar Anti-Bacterial Deep Cleansing', 45, 93);
insert into good (name, price, amount) values ('Buspirone Hydrochloride', 20, 93);
insert into good (name, price, amount) values ('Dr. Jart Water Fuse Beauty Balm', 42, 29);
insert into good (name, price, amount) values ('Cold Sore Treatment', 96, 19);
insert into good (name, price, amount) values ('NeoStrata Antibacterial Facial Cleanser', 14, 16);
insert into good (name, price, amount) values ('Zaroxolyn', 65, 70);
insert into good (name, price, amount) values ('OATS FOOD', 72, 98);
insert into good (name, price, amount) values ('Xylocaine', 40, 61);
insert into good (name, price, amount) values ('RED GINSENG FERMENTED SUN', 88, 63);
insert into good (name, price, amount) values ('Yeast Freee', 1, 45);
insert into good (name, price, amount) values ('FUNGUS FREE', 8, 30);
insert into good (name, price, amount) values ('Lorzone', 86, 25);
insert into good (name, price, amount) values ('Gabapentin', 68, 23);
insert into good (name, price, amount) values ('LBEL NATURAL FINISH MOISTURIZING FOUNDATION SPF 25', 12, 64);
insert into good (name, price, amount) values ('Mi-Acid Gas Relief', 41, 69);
insert into good (name, price, amount) values ('PRIMAXIN', 45, 17);
insert into good (name, price, amount) values ('pain and fever', 21, 75);
insert into good (name, price, amount) values ('Orphenadrine Citrate', 63, 56);
insert into good (name, price, amount) values ('PredniSONE', 83, 17);
insert into good (name, price, amount) values ('Allopurinol', 8, 61);
insert into good (name, price, amount) values ('Metoprolol Tartrate', 98, 53);
insert into good (name, price, amount) values ('Prednisone', 37, 74);
insert into good (name, price, amount) values ('Flu and Severe Cold and Cough', 15, 44);
insert into good (name, price, amount) values ('Amoxicillin', 87, 21);
insert into good (name, price, amount) values ('Propafenone', 12, 22);
insert into good (name, price, amount) values ('preferred plus nicotine', 59, 25);
insert into good (name, price, amount) values ('Verapamil Hydrochloride', 27, 7);
insert into good (name, price, amount) values ('VITALUMIERE AQUA', 60, 3);
insert into good (name, price, amount) values ('NO-JET-LAG', 84, 97);
insert into good (name, price, amount) values ('SHISEIDO WHITE LUCENT BRIGHTENING SPOT-CONTROL FOUNDATION (REFILL)', 23, 1);
insert into good (name, price, amount) values ('Phenytoin Sodium', 10, 88);
insert into good (name, price, amount) values ('Amitriptyline Hydrochloride', 24, 27);
insert into good (name, price, amount) values ('Klor-Con', 79, 17);
insert into good (name, price, amount) values ('Lisinopril', 89, 51);
insert into good (name, price, amount) values ('Treatment Set TS351003', 19, 56);
insert into good (name, price, amount) values ('FONDAPARINUX SODIUM', 60, 47);
insert into good (name, price, amount) values ('NYSTATIN', 71, 13);
insert into good (name, price, amount) values ('AZELEX', 43, 78);
insert into good (name, price, amount) values ('Triamterene and Hydrochlorothiazide', 58, 100);
insert into good (name, price, amount) values ('FIKES Foaming Anti-Microbial Food Service Hand Wash', 57, 79);
insert into good (name, price, amount) values ('flormar Foundation Sunscreen Broad Spectrum SPF 20 LF22 PURE BEIGE', 66, 20);
insert into good (name, price, amount) values ('Felodipine', 52, 91);
insert into good (name, price, amount) values ('Cold Spot', 11, 20);
insert into good (name, price, amount) values ('365 Everyday Value Be Well Cough Ease for Kids', 21, 78);
insert into good (name, price, amount) values ('Warfarin Sodium', 13, 62);
insert into good (name, price, amount) values ('Ondansetron', 1, 28);
insert into good (name, price, amount) values ('Night Time Cherry', 19, 77);
insert into good (name, price, amount) values ('Hepapar', 6, 23);
insert into good (name, price, amount) values ('Metoclopramide Hydrochloride', 30, 56);
insert into good (name, price, amount) values ('SHISEIDO ULTIMATE SUN PROTECTION PLUS', 16, 74);
insert into good (name, price, amount) values ('No7 Lifting and Firming Foundation Sunscreen SPF 15 Nude', 62, 19);
insert into good (name, price, amount) values ('Childrens Pain Relief', 10, 22);
insert into good (name, price, amount) values ('DNA', 53, 50);
insert into good (name, price, amount) values ('Morphine Sulfate', 90, 96);
insert into good (name, price, amount) values ('WHITE MULBERRY POLLEN', 14, 83);
insert into good (name, price, amount) values ('Herbion Naturals', 23, 98);
insert into good (name, price, amount) values ('Promethazine Hydrochloride', 59, 96);
insert into good (name, price, amount) values ('CIPROFLOXACIN', 90, 6);
insert into good (name, price, amount) values ('Peptic Relief', 5, 83);
insert into good (name, price, amount) values ('Olay Acne Control Face Wash', 75, 19);
insert into good (name, price, amount) values ('Dicyclomine Hydrochloride', 6, 89);
insert into good (name, price, amount) values ('Digoxin', 12, 29);
insert into good (name, price, amount) values ('Omeprazole', 35, 16);
insert into good (name, price, amount) values ('smart sense triple antibiotic', 97, 21);
insert into good (name, price, amount) values ('GEODON', 89, 3);
insert into good (name, price, amount) values ('Warfarin Sodium', 63, 1);
insert into good (name, price, amount) values ('Azithromycin', 69, 59);
insert into good (name, price, amount) values ('Hepar Sulf', 81, 26);
insert into good (name, price, amount) values ('Lithium Carbonate', 66, 27);
insert into good (name, price, amount) values ('Stool Softener', 88, 44);
insert into good (name, price, amount) values ('Hydroxyzine Hydrochloride', 85, 95);
insert into good (name, price, amount) values ('Listerine Whitening Anticavity Vibrant - Clean Mint', 34, 27);
");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql("
        SET FOREIGN_KEY_CHECKS = 0;
        TRUNCATE TABLE good;
        SET FOREIGN_KEY_CHECKS = 1;");

    }
}
