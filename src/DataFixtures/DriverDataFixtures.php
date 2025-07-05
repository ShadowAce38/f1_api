<?php

namespace App\DataFixtures;

use App\Entity\Driver;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class DriverDataFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $drivers = [
            ['Alex', 'Albon', 23, 'Thai', 'williams'],
            ['Fernando', 'Alonso', 14, 'Spanish', 'aston_martin'],
            ['Andrea Kimi', 'Antonelli', 12, 'Italian', 'mercedes'],
            ['Oliver', 'Bearman', 87, 'British', 'haas'],
            ['Gabriel', 'Bortoleto', 5, 'Brazilian', 'sauber'],
            ['Franco', 'Colapinto', 43, 'Argentine', 'alpine'],
            ['Pierre', 'Gasly', 10, 'French', 'alpine'],
            ['Isack', 'Hadjar', 6, 'French', 'rb'],
            ['Lewis', 'Hamilton', 44, 'British', 'ferrari'],
            ['Nico', 'Hülkenberg', 27, 'German', 'sauber'],
            ['Charles', 'Leclerc', 16, 'Monegasque', 'ferrari'],
            ['Liam', 'Lawson', 30, 'New Zealander', 'rb'],
            ['Lando', 'Norris', 4, 'British', 'mclaren'],
            ['Esteban', 'Ocon', 31, 'French', 'haas'],
            ['Oscar', 'Piastri', 81, 'Australian', 'mclaren'],
            ['George', 'Russell', 63, 'British', 'mercedes'],
            ['Carlos', 'Sainz', 55, 'Spanish', 'williams'],
            ['Lance', 'Stroll', 18, 'Canadian', 'aston_martin'],
            ['Yuki', 'Tsunoda', 22, 'Japanese', 'red_bull'],
            ['Max', 'Verstappen', 1, 'Dutch', 'red_bull']
        ];

        foreach ($drivers as [$firstName, $lastName, $number, $nationality, $teamRef]) {
            $driver = new Driver();
            $driver->setFirstName($firstName)
                   ->setLastName($lastName)
                   ->setNumber($number)
                   ->setNationality($nationality)
                   ->setTeam($this->getReference('team_' . $teamRef));

            $manager->persist($driver);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            TeamDataFixtures::class,
        ];
    }
}
