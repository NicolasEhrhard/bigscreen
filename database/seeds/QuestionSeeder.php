<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        DB::table('question')->insert(
            [
                'number' => 1,
                'title' => 'Votre adresse mail',
                'questionType' => 'saisie',
            ],
            [
                'number' => 2,
                'title' => 'Votre âge',
                'questionType' => 'saisie',
            ],
            [
                'number' => 3,
                'title' => 'Votre sexe',
                'questionType' => 'choice',
                'choice' => ['Homme', 'Femme', 'Préfère ne pas répondre']
            ],
            [
                'number' => 4,
                'title' => 'Nombre de personne dans votre foyer (adulte & enfants )',
                'questionType' => 'numeric',
            ],
            [
                'number' => 5,
                'title' => 'Votre profession',
                'questionType' => 'saisie',
            ]
        );
        DB::table('question')->insert([
            'number' => 6,
            'title' => 'Quelle marque de casque VR utilisez-vous ?',
            'questionType' => 'choice',
            'choice' => ['Occulus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'PSVR']
        ]);
        DB::table('question')->insert([
            'number' => 7,
            'title' => "Sur quelle magasin d'application achetez-vous des contenus VR ?",
            'questionType' => 'choice',
            'choice' => ['SteamVR', 'Occulus Store', 'Viveport', 'Playstation VR', 'Google Play', 'Windows Store']
        ]);
        DB::table('question')->insert([
            'number' => 8,
            'title' => "Quelle casque envisagez-vous d'acheter dans un futur proche ?",
            'questionType' => 'choice',
            'choice' => ['Occulus Quest', 'Occulus Go', 'HTC Vive Pro', 'Autre', 'Aucun']
        ]);
        DB::table('question')->insert([
            'number' => 9,
            'title' => 'Au sein de votre foyer, combien de personne utilisent votre casque VR pour regarder Bigscreen ?',
            'questionType' => 'numeric',
        ]);
        DB::table('question')->insert([
            'number' => 10,
            'title' => "Vous utilisez principalement Bigscreen pour :",
            'questionType' => 'choice',
            'choice' => ['Regarder des émissions TV en direct', 'Regarder des films', 'Jouer en solo', 'Jouer en team']
        ]);
        DB::table('question')->insert([
            'number' => 11,
            'title' => "Combien donnez-vous de point pour la qualité de l'image sur Biscreen ?",
            'questionType' => 'numeric',
        ]);
        DB::table('question')->insert([
            'number' => 12,
            'title' => "Combien donnez-vous de point pour le confort d'utilisation de l'interface Biscreen ?",
            'questionType' => 'numeric',
        ]);
        DB::table('question')->insert([
            'number' => 13,
            'title' => "Combien donnez-vous de point pour la connection réseau de Biscreen ?",
            'questionType' => 'numeric',
        ]);
        DB::table('question')->insert([
            'number' => 14,
            'title' => "Combien donnez-vous de point pour la qualité des graphismes 3D dans Biscreen ?",
            'questionType' => 'numeric',
        ]);
        DB::table('question')->insert([
            'number' => 15,
            'title' => "Combien donnez-vous de point pour la qualité audio dans Biscreen ?",
            'questionType' => 'numeric',
        ]);
        DB::table('question')->insert([
            'number' => 16,
            'title' => "Aimeriez-vous avoir des notifications plus précises au cours de vos sessions Biscreen ?",
            'questionType' => 'choice',
            'choice' => ['Oui', 'Non']
        ]);
        DB::table('question')->insert([
            'number' => 17,
            'title' => "Aimeriez-vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?",
            'questionType' => 'choice',
            'choice' => ['Oui', 'Non']
        ]);
        DB::table('question')->insert([
            'number' => 18,
            'title' => "Aimeriez-vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?",
            'questionType' => 'numeric',
        ]);
        DB::table('question')->insert([
            'number' => 19,
            'title' => "Aimeriez-vous jouer à des jeux exclusifs sur votre Bigscreen ?",
            'questionType' => 'numeric',
        ]);
        DB::table('question')->insert([
            'number' => 20,
            'title' => 'Quelle nouvelle fonctionnalité de vos rêve devrait exister sur Biscreen ?',
            'questionType' => 'saisie',
        ]);
    }

}