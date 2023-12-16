<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MagicSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('magic_products')->insert([
            [
                'magic_id' => 1,
                "rating_id" => "2",
                'name' => 'Tarot divertido',
                'price' => 10000,
                'description' => 'Un juego de tarot con ilustraciones modernas y divertidas, que te ayudará a conocer tu futuro y a tomar mejores decisiones. El juego incluye un libro con instrucciones y consejos para interpretar las cartas. Este producto pertenece a las categorías de tarots, libros y diversión. ',
                'category' => 'conexion espiritual',
                'image' => 'imagesMagic/tarot-divertido.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'magic_id' => 2,
                "rating_id" => "1",
                'name' => 'Colgante de la flor de la vida',
                'price' => 4000,
                'description' => 'Un colgante de plata con la forma de la flor de la vida, un antiguo y poderoso símbolo de la geometría sagrada. Este colgante te protegerá de las energías negativas y te conectará con la armonía del universo. Además, es un accesorio elegante y discreto que podrás combinar con cualquier atuendo. Este producto pertenece a las categorías de amuletos, joyería y protección.',
                'category' => 'geometria sagrada',
                'image' => 'imagesMagic/collar-flor-de-la-vida.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'magic_id' => 3,
                "rating_id" => "3",
                'name' => 'Libro de aromaterapia',
                'price' => 8000,
                'description' => ' Un libro de aromaterapia con recetas y consejos para usar los aceites esenciales con fines curativos, cosméticos y espirituales. El libro te enseñará cómo elegir los aceites adecuados para cada situación, cómo aplicarlos y cómo combinarlos. También te explicará los beneficios de cada aceite y sus propiedades esotéricas. Este producto pertenece a las categorías de libros, salud y magia.',
                'category' => 'terapias naturales',
                'image' => 'imagesMagic/aromaterapia.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'magic_id' => 4,
                "rating_id" => "4",
                'name' => 'Cuarzo rosa',
                'price' => 3500,
                'description' => 'El cuarzo rosa es una de las piedras más populares y buscadas por sus propiedades espirituales y curativas. Se dice que el cuarzo rosa es la piedra del amor universal, ya que ayuda a abrir el corazón y atraer el amor en todas sus formas: amor propio, amor romántico, amor familiar, amor platónico y amor incondicional.',
                'category' => 'cristaloterapia',
                'image' => 'imagesMagic/cuarzo-rosa.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('products_have_types')->insert([
            [
                'magic_id' => 1,
                'types_id' => 3,
            ],
            [
                'magic_id' => 2,
                'types_id' => 4,
            ],
            [
                'magic_id' => 3,
                'types_id' => 4,
            ],
            [
                'magic_id' => 4,
                'types_id' => 2,
            ],
        ]);
    }
}
