<?php

namespace App\DataFixtures;

use DateInterval;
use App\Entity\User;
use App\Entity\Activity;
use App\Entity\TimeSpent;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $em)
    {

        for ($u = 1; $u < 4; $u++) {
            $user = new User();
            $user->setUsername('toto' . $u);

            $user->setPassword($this->passwordHasher->hashPassword(
                $user,
                'toto'
            ));

            for ($y = 1; $y < 3; $y++) {
                $activity = new Activity();
                $activity->setName('test' . $y . $u);

                for ($i = 1; $i < 10; $i++) {
                    $datetime = new \DateTime();
                    $timeSpent = new TimeSpent();
                    $timeSpent->setActivity($activity);
                    $timeSpent->setUser($user);
                    $timeSpent->setHour($i);
                    $timeSpent->setDate($datetime->sub(new DateInterval('P' . $i . 'D')));

                    $em->persist($user);
                    $em->persist($activity);
                    $em->persist($timeSpent);
                }
            }
        }
        $em->flush();
    }
}
