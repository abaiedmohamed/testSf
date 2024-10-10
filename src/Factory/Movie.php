<?

namespace App\Factory;

use App\Dto\Movie as DtoMovie;
use App\Dto\Video;

final readonly class Movie
{

    public static function new(DtoMovie $movie, ?Video $video, string $urlPicutre): DtoMovie
    {
        $movie = $movie
            ->setVideoDetails($video)
            ->setBackdropPath($urlPicutre . $movie->getBackdropPath())
            ->setPosterPath($urlPicutre . $movie->getPosterPath());

        return $movie;
    }
}
