<?php

namespace App\DataFixtures;

use App\Entity\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RaceDataFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $races = [
            [1, 'Australian Grand Prix', 'Albert Park Circuit', 'Melbourne, Australia', '2025-03-16', 2025],
            [2, 'Chinese Grand Prix', 'Shanghai International Circuit', 'Shanghai, China', '2025-03-23', 2025],
            [3, 'Japanese Grand Prix', 'Suzuka Circuit', 'Suzuka, Japan', '2025-04-06', 2025],
            [4, 'Bahrain Grand Prix', 'Bahrain International Circuit', 'Sakhir, Bahrain', '2025-04-13', 2025],
            [5, 'Saudi Arabia Grand Prix', 'Jeddah Corniche Circuit', 'Jeddah, Saudi Arabia', '2025-04-20', 2025],
            [6, 'Miami Grand Prix', 'Miami International Autodrome', 'Miami, USA', '2025-05-04', 2025],
            [7, 'Emilia Romagna Grand Prix', 'Autodromo Enzo e Dino Ferrari', 'Imola, Italy', '2025-05-18', 2025],
            [8, 'Monaco Grand Prix', 'Circuit de Monaco', 'Monte Carlo, Monaco', '2025-05-25', 2025],
            [9, 'Spanish Grand Prix', 'Circuit de Barcelona-Catalunya', 'Montmeló, Spain', '2025-06-01', 2025],
            [10, 'Canadian Grand Prix', 'Circuit Gilles Villeneuve', 'Montreal, Canada', '2025-06-15', 2025],
            [11, 'Austrian Grand Prix', 'Red Bull Ring', 'Spielberg, Austria', '2025-06-29', 2025],
            [12, 'British Grand Prix', 'Silverstone Circuit', 'Silverstone, UK', '2025-07-06', 2025],
            [13, 'Belgian Grand Prix', 'Circuit de Spa-Francorchamps', 'Spa-Francorchamps, Belgium', '2025-07-27', 2025],
            [14, 'Hungarian Grand Prix', 'Hungaroring', 'Budapest, Hungary', '2025-08-03', 2025],
            [15, 'Dutch Grand Prix', 'Circuit Zandvoort', 'Zandvoort, Netherlands', '2025-08-31', 2025],
            [16, 'Italian Grand Prix', 'Autodromo Nazionale Monza', 'Monza, Italy', '2025-09-07', 2025],
            [17, 'Azerbaijan Grand Prix', 'Baku City Circuit', 'Baku, Azerbaijan', '2025-09-21', 2025],
            [18, 'Singapore Grand Prix', 'Marina Bay Street Circuit', 'Singapore, Singapore', '2025-10-05', 2025],
            [19, 'United States Grand Prix', 'Circuit of the Americas', 'Austin, USA', '2025-10-19', 2025],
            [20, 'Mexico City Grand Prix', 'Autódromo Hermanos Rodríguez', 'Mexico City, Mexico', '2025-10-26', 2025],
            [21, 'São Paulo Grand Prix', 'Autódromo José Carlos Pace', 'São Paulo, Brazil', '2025-11-09', 2025],
            [22, 'Las Vegas Grand Prix', 'Las Vegas Strip Circuit', 'Las Vegas, USA', '2025-11-22', 2025],
            [23, 'Qatar Grand Prix', 'Lusail International Circuit', 'Lusail, Qatar', '2025-11-30', 2025],
            [24, 'Abu Dhabi Grand Prix', 'Yas Marina Circuit', 'Abu Dhabi, UAE', '2025-12-07', 2025],
        ];

        foreach ($races as [$round, $name, $circuit, $location, $dateStr, $season]) {
            $race = new Race();
            $race->setRound($round);
            $race->setName($name);
            $race->setCircuit($circuit);
            $race->setLocation($location);
            $race->setDate(new \DateTimeImmutable($dateStr));
            $race->setSeason($season);

            $manager->persist($race);
        }

        $manager->flush();
    }
}