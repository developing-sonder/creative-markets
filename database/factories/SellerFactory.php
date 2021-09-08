<?php

namespace Database\Factories;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

class SellerFactory extends Factory
{
    use WithFaker;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seller::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //dd($this->faker);
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'shop_category' => $this->randomShopCategory(),
            'perspective_on_quality' => $this->randomPerspectiveOnQuality(),
            'experience_level' => $this->randomExperienceLevel(),
            'understanding_business' => $this->randomUnderstandingOfBusiness()
        ];
    }

    /**
     * State - Set the online_stores and author_content_confirmation fields to true
     *
     * @return Factory
     */
    public function has_online_stores(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'has_online_stores' => 1,
                'author_content_confirmation' => 1
            ];
        });
    }

    /**
     * Return an random value for the ExperienceLevel Field
     *
     * @return string
     */
    protected function randomExperienceLevel(): string
    {
       return $this->faker->randomElement([
            'I sell on multiple marketplaces and through my own website',
            'I have experience selling through only my own website',
            'I have experience selling through multiple marketplaces',
            'I have experience selling through on online marketplace',
            'I\'m new to selling creative products online',
        ]);
    }

    /**
     * Return an random value for the PerspectiveOnQuality Field
     *
     * @return string
     */
    protected function randomPerspectiveOnQuality(): string
    {
       return $this->faker->randomElement([
            'I don\'t care what it takes, my products are the highest quality possible',
            'I put in enough effort to make my product pretty high quality, but at some point my time is better spent elsewhere',
            'I try to get quality products out quickly, even if I need to take a shortcut now and then',
            'I spend the minimum amount of time & effort it takes to create products that are accpetable quality',
            'Quantity is more important to me than quality',
        ]);
    }

    /**
     * Return an random value for the Shop Category Field
     *
     * @return string
     */
    protected function randomShopCategory(): string
    {
       return $this->faker->randomElement([
            'Graphics',
            'Fonts',
            'Templates',
            'Add-Ons',
            'Photos',
            'Web Themes',
            '3D'
        ]);
    }

    /**
     * Return an random value for the UnderstandingOfBusiness Field
     *
     * @return string
     */
    protected function randomUnderstandingOfBusiness(): string
    {
       return $this->faker->randomElement([
            'I have an extensive background in business and/or marketing',
            'I\'m familiar with some skills & techniques, but I\'m not sure how to apply them when selling my creative work',
            'I\'m  vaguely aware of basic business & marketing concepts',
            'I\'m  not interested in understanding business and marketing',
        ]);
    }
}
