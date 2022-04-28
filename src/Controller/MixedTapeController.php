<?php 

namespace App\Controller; // Directory controller

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response; // use Response
use Symfony\Component\Routing\Annotation\Route; // use Route
use function Symfony\Component\String\u;
use Twig\Environment;

class MixedTapeController extends AbstractController {

    #[Route('/', name: 'app_homepage')]
    public function homepage(Environment $twig): Response // indicates this is a Response object
     {

        $tracks = [
            ['song'=>'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song'=>'Beautiful', 'artist' => 'Eminem'],
            ['song'=>'Without me', 'artist' => 'Eminem'],
            ['song'=>'Fantasy', 'artist' => 'Mariah Carey'],
            ['song'=>'On Bended Knee', 'artist' => 'Boyz II Men'],
        ];

        // dump($tracks);

        // die("Mixed-Tapes: Surely, not fancy looking page");
        $html = $this->render('mixed/homepage.html.twig', [
            'title' => 'Mixed 90s music',
            'tracks' => $tracks
        ]);
        return($html);
        // dd($html);
        // return new Response($html);
        // return new Response("Pink Floyd --- Another Brick In the wall");
    }

    #[Route('/browse/{slug}' , name: 'app_browse')]
    //  $slug = null indicates that the $slug is optional. Otherwise, it will throw error
    public function browse(string $slug = null): Response // indicates this is a Response object
    {
        // if($slug) {
        //     $title = u(str_replace('-', ' ', $slug))->title(true);         
        // } else {
        //     $title = "All Genres";
        // }

        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;
        return $this->render('mixed/browse.html.twig', [
            'genre' => $genre,
        ]);
        // return new Response('Genre: ' . $title);
        // return new Response("Breakup mized-tape? Angsty 90s rock? Browse he collection");

    }
}

