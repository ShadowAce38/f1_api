<?php

namespace App\DataFixtures;

use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TeamDataFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $teams = [
            'red_bull' => ['Red Bull Racing', 'Austria', 'Honda'],
            'mercedes' => ['Mercedes-AMG Petronas Formula One Team', 'Germany', 'Mercedes'],
            'ferrari' => ['Scuderia Ferrari', 'Italy', 'Ferrari'],
            'mclaren' => ['McLaren Formula 1 Team', 'UK', 'Mercedes'],
            'aston_martin' => ['Aston Martin Aramco Formula One Team', 'UK', 'Mercedes'],
            'alpine' => ['BWT Alpine F1 Team', 'France', 'Renault'],
            'williams' => ['Williams Racing', 'England', 'Mercedes'],
            'rb' => ['Visa Cash App RB F1 Team', 'Italy', 'Honda'],
            'sauber' => ['Stake F1 Team Kick Sauber', 'Switzerland', 'Ferrari'],
            'haas' => ['MoneyGram Haas F1 Team', 'USA', 'Ferrari'],
        ];

        foreach ($teams as $ref => [$name, $country, $engine]) {
            $team = new Team();
            $team->setName($name);
            $team->setCountry($country);
            $team->setEngine($engine);

            $manager->persist($team);
            $this->addReference('team_' . $ref, $team);
        }

        $manager->flush();
    }
}
