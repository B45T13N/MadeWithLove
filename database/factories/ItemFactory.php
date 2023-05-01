<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imgSource = ["https://thumbs.dreamstime.com/z/objet-simple-de-banane-naturelle-coup%C3%A9-sur-le-backgroun-blanc-132016085.jpg",
            "https://previews.123rf.com/images/leszekglasner/leszekglasner1310/leszekglasner131000934/23216968-roue-objet-isol%C3%A9-simple-et-%C3%A9l%C3%A9gante-horloge-en-verre-de-sable.jpg",
            "https://previews.123rf.com/images/firina/firina1409/firina140900020/31580061-chaussure-de-sport-isol%C3%A9-sur-fond-blanc-objet-simple-avec-chemin-de-d%C3%A9tourage.jpg",
            "https://media.istockphoto.com/id/902901494/fr/vectoriel/simple-paint-roller-objet-dessin-illustration-vectorielle.jpg?s=612x612&w=is&k=20&c=M4lx66CJBSabRpBmvosg02ScLw3g8NpqM1Vc4ExzNtg=",
            "https://static.vecteezy.com/ti/vecteur-libre/p2/9431833-icone-de-tissu-de-salle-de-bains-illustrationle-concept-d-objet-conception-simple-premium-gratuit-vectoriel.jpg"
        ];
        return [
            'name' => fake()->name(),
            'img' => $imgSource[fake()->numberBetween(0, 4)],
            'price' => fake()->numberBetween(0, 100) * 0.1,
            'counterAdded' => fake()->numberBetween(0, 50),
            'isPurchased' => fake()->boolean()
        ];
    }
}
