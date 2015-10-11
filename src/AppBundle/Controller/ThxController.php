<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Quizset;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use QuizBundle\Utils\Quiz;
use QuizBundle\Utils\Data\QuizData;

class ThxController extends Controller
{
    private $em;
    private $Quiz;

    /**
     * @Route("/thx", name="thxpage")
     */
    public function indexAction(Request $request)
    {
        $this->em = $this->getDoctrine()->getManager();
        $this->Quiz = new Quiz($this->getUser()->getId(), new QuizData($this->em));

        return $this->decideWhatToShow($request);
    }

    public function decideWhatToShow(Request $request)
    {
        $state = $this->Quiz->decideWhatToDo();
        if( $state == "warning" || $state == "timer")
        {
            return $this->redirectToRoute('beforepage');
        }

        $this->Quiz->saveEndTime();
        $okey = $this->Quiz->saveQuiz($request);

        if( !$okey ){
            return $this->redirectToRoute('quizpage');
        }

        // replace this example code with whatever you need
        return $this->render('AppBundle:thx:index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
