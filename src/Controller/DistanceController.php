<?php


namespace App\Controller;


use App\Utils\Algorithm;
use App\Utils\Transformation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     *
     * @return Response
     */
    public function indexAction(Request $request)
    {
        // available algorithms:
        //     google_directions_30
        //     google_directions
        //     straight

        // available transformations:
        //     even_distribution
        //     log_with_base

        $homeCoordinates = $request->get('origins');
        $workCoordinates = $request->get('destinations');

        // '49.9808,36.2527', '50.4547,30.5238'
        $data = $this->durationScore->evaluate($homeCoordinates, $workCoordinates, Algorithm::GOOGLE_DIRECTIONS, Transformation::EVEN_DISTRIBUTION);
        return new Response($data);
    }
}