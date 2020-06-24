<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use ZYS\DurationScoreBundle\DurationScore\DurationScore;

class DistanceController extends AbstractController
{


    /**
     * @var DurationScore
     */
    private $durationScore;

    public function __construct(DurationScore $durationScore)
    {
        $this->durationScore = $durationScore;
    }

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        // available algorithms:
        //     google_directions_30
        //     google_directions
        //     straight

        // available transformations:
        //     even_distribution
        //     log_with_base
        $data = $this->durationScore->evaluate('49.9808,36.2527', '50.4547,30.5238', '', '');
        return new Response($data);
    }
}