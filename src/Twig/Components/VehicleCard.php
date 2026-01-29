<?php
namespace App\Twig\Components;

use App\Entity\Model;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('vehicle_card')]
class VehicleCard
{
      public Model $vehicle;
}