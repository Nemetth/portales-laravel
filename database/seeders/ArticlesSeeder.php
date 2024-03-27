<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'id' => 1,
                'title' => 'Alineamiento cósmico',
                'subtitle' => 'Los planetas son 9, no 8',
                'body' => 'En el fascinante mundo de la astrología y la espiritualidad, siempre estamos buscando señales y pistas en el cosmos que nos guíen en nuestro viaje espiritual. Uno de los temas más intrigantes en este campo es la constante danza de los planetas y sus alineamientos. ¿Pero sabías que quizás hemos estado contando mal?
                La mayoría de nosotros aprendimos en la escuela que hay ocho planetas en nuestro sistema solar, pero algunos astrónomos y expertos en esoterismo creen que hay uno más que merece nuestra atención: Lilith, a veces llamado el "nuevo planeta". Este misterioso cuerpo celeste ha sido objeto de debate durante años, y su influencia en la astrología y la espiritualidad está en constante evolución.',
                'image' => 'imagesArticles/alineamiento.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Las luces son más efectivas que el fuego',
                'subtitle' => 'Por qué vencer a tu enemigo con retórica es mejor que lanzar un hechizo',
                'body' => 'En las tradiciones espirituales de todo el mundo, las palabras han sido consideradas como una forma de manifestar nuestra realidad. La retórica bien elaborada y las conversaciones significativas tienen el poder de cambiar la percepción de las personas y, en última instancia, su comportamiento. Al comunicarnos con claridad y compasión, podemos influir en los demás de maneras que un hechizo nunca podría.Cuando optamos por la retórica en lugar de la magia, estamos eligiendo construir puentes en lugar de levantar barreras. La comunicación efectiva nos permite entender mejor a nuestros "enemigos" y encontrar puntos en común en lugar de luchar contra ellos. Esta es una forma más elevada de abordar los conflictos y puede conducir a soluciones más pacíficas y duraderas.',
                'image' => 'imagesArticles/luces.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'Como gobernar un país desde las sombras',
                'subtitle' => '10 tips para susurrar el oído correcto',
                'body' => 'En la búsqueda de gobernar un país desde las sombras, la espiritualidad emerge como una fuente de guía silenciosa, donde la conexión profunda con principios ancestrales y energías universales se convierte en el faro que ilumina el camino hacia decisiones políticas basadas en la sabiduría atemporal y el bienestar a largo plazo de la nación y su gente.',
                'image' => 'imagesArticles/sombras.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
