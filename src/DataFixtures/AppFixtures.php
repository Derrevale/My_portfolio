<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Media;
use App\Entity\Reference;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private UserPasswordEncoderInterface $userPasswordEncoder;

    /**
     * AppFixtures constructor.
     * @param UserPasswordEncoderInterface $userPasswordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setPassword($this->userPasswordEncoder->encodePassword($admin, "Moimoimoi02--"));
        $admin->setEmail("valentinderreumaux03@gmail.com");
        $manager->persist($admin);

        for ($i = 1; $i <= 8; $i++) {
            if ($i == 1){
                $reference = new Reference();
                $reference->setTitle("Formation Kotlin OpenClassrooms ");
                $reference->setCompany("OpenClassrooms");
                $reference->setDescription("Temps Réel 12h Temps Valorisé 10h ");
                $reference->setStartedAt(new \DateTimeImmutable("2021-11-03"));
                $reference->setEndedAt(new \DateTimeImmutable("2021-12-29"));
                $media = new Media();
                $media->setPath("uploads/Formation_kotlin.png");
                $reference->addMedia($media);
                $manager->persist($reference);
            }
            elseif ($i ==2){
                $reference = new Reference();
                $reference->setTitle("Formation Java OpenClassrooms ");
                $reference->setCompany("OpenClassrooms");
                $reference->setDescription("Temps Réel 40h Temps Valorisé 10h ");
                $reference->setStartedAt(new \DateTimeImmutable("2019-11-30"));
                $reference->setEndedAt(new \DateTimeImmutable("2020-01-03"));
                $media = new Media();
                $media->setPath("uploads/Formation_java.png");
                $reference->addMedia($media);
                $manager->persist($reference);
            }
            elseif ($i ==3){
                $reference = new Reference();
                $reference->setTitle("Responsable de section ");
                $reference->setCompany("SGP");
                $reference->setDescription("Temps Réel +3000h Temps Valorisé 10h ");
                $reference->setStartedAt(new \DateTimeImmutable("2018-11-03"));
                $reference->setEndedAt(new \DateTimeImmutable(""));
                $media = new Media();
                $media->setPath("uploads/Scout.jpg");
                $reference->addMedia($media);
                $manager->persist($reference);
            }
            elseif ($i ==4){
                $reference = new Reference();
                $reference->setTitle("Animateur / Soutient Extrascolaire ");
                $reference->setCompany("Promosport");
                $reference->setDescription("Temps Réel 190h Temps Valorisé 10h ");
                $reference->setStartedAt(new \DateTimeImmutable("2019-01-01"));
                $reference->setEndedAt(new \DateTimeImmutable(""));
                $media = new Media();
                $media->setPath("uploads/fiche_promosport.png");
                $reference->addMedia($media);
                $manager->persist($reference);
            }
            elseif ($i ==5){
                $reference = new Reference();
                $reference->setTitle("Formation Python OpenClassrooms ");
                $reference->setCompany("OpenClassrooms");
                $reference->setDescription("Temps Réel 40h Temps Valorisé 10h ");
                $reference->setStartedAt(new \DateTimeImmutable("2020-09-23"));
                $reference->setEndedAt(new \DateTimeImmutable("2020-12-15"));
                $media = new Media();
                $media->setPath("uploads/Formation_python.png");
                $reference->addMedia($media);
                $manager->persist($reference);
            }
            elseif ($i ==6){
                $reference = new Reference();
                $reference->setTitle("Technicien en Informatique / Etudiant");
                $reference->setCompany("Atelier d’architecture Bernard Berger");
                $reference->setDescription("Temps Réel 150h Temps Valorisé 10h ");
                $reference->setStartedAt(new \DateTimeImmutable("2019-11-01"));
                $reference->setEndedAt(new \DateTimeImmutable("2021-01-01"));
                $media = new Media();
                $media->setPath("uploads/Fiche_atelier_bernard.png");
                $reference->addMedia($media);
                $manager->persist($reference);
            }
            elseif ($i ==7){
                $reference = new Reference();
                $reference->setTitle("Formation PHP OpenClassrooms ");
                $reference->setCompany("OpenClassrooms");
                $reference->setDescription("Temps Réel 10h Temps Valorisé 0h ");
                $reference->setStartedAt(new \DateTimeImmutable("2022-04-29"));
                $reference->setEndedAt(new \DateTimeImmutable("2022-05-2"));
                $media = new Media();
                $media->setPath("uploads/Formation_php.png");
                $reference->addMedia($media);
                $manager->persist($reference);
            }
            elseif ($i ==8){
                $reference = new Reference();
                $reference->setTitle("Symfony 5 OpenClassrooms ");
                $reference->setCompany("OpenClassrooms");
                $reference->setDescription("Temps Réel 20h Temps Valorisé 0h ");
                $reference->setStartedAt(new \DateTimeImmutable("2021-02-11"));
                $reference->setEndedAt(new \DateTimeImmutable("2021-06-29"));
                $media = new Media();
                $media->setPath("uploads/Formation_symfony.png");
                $reference->addMedia($media);
                $manager->persist($reference);
            }

        }

        $manager->flush();
    }
}
