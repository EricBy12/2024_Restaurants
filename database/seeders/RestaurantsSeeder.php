<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurants;
use Carbon\Carbon;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
            Restaurants::insert([
                ['name' => 'FIRE steakhouse and BAR', 'description' => 'FIRE Steakhouse & Bar Dublin offers the ultimate high-end casual dining experience. Whether you are dining in our main restaurant, all-weather terrace or looking to experience an intimate evening in one of our private dining rooms, you’ll enjoy the unique setting and perfect ambience of FIRE Steakhouse & Bar. Your personal server will be happy to explain the origin of all our dishes, pairing them with wine recommendations from our extensive new and old-world wine selection. With an array of locally sourced dishes to make your mouth water, we are sure you will find something to please your palette. Our signature dishes of Wood-Fired Jumbo Tiger Prawns, and our succulent Peter Hannon and Irish Hereford Prime Irish Steaks come highly recommended. We welcome you to one of the best steakhouse restaurants in Dublin.', 'location' => 'Dawson Street, Dublin', 'image' => 'FireSteakhouseandBar.jpg'],
                ['name' => 'Sophies', 'description' => 'A glasshouse restaurant, where the weather is our wallpaper. We serve breakfast and dinner 7 days a week. We do lunch on weekdays and brunch at the weekend. Our New York - Italian - Irish menu is simple and delicious. Meats, fish, vegetables, fruits, herbs and dairy delivered daily by local suppliers. The restaurant vibe changes from a laid back sunrise through a buzzing sunset. A view like no other in Dublin, cityscape to countryside. No fuss, no formality, book a table and enjoy! Breakfast 7am - 11am (from 8am on weekends!) Lunch 12pm - 3pm (Mon - Friday) with a superb brunch from 11am - 3pm on Saturday, Sunday & Bank Holiday Mondays. Enjoy dinner from 5:30pm 7 days per week. Stopping by for some afternoon refreshments? We serve our wood-fired pizzas right throughout the day.', 'location' => '33 Harcourt Street, Dublin','image' => 'Sophies.jpg'],
                ['name' => 'Mister S', 'description' => 'Mister S serves up the best of Irish meat, fish and vegetables which have all been cooked over a bespoke wood and charcoal grill. Expect dry-aged steaks, smoked meats & sustainably sourced fish in a warm and welcoming space.', 'location' => '32 Camden Street Lower Saint Kevins, Dublin','image' => 'MisterS.jpg'],
                ['name' => 'Murrays Bar', 'description' => 'Located in the heart of Dublin, Murray’s Bar features a comfortable, cosy, traditional Irish bar and lounge serving traditional Irish dishes as well as contemporary favourites with live sports and entertainment 7 days a week.', 'location' => '33-34 OConnel St., Dublin','image' => 'murraysbar.jpg'],
                ['name' => 'The Ivy Dawson Street', 'description' => 'Taking pride of place on one of Dublins most fashionable streets, the brasserie-style restaurant and bar accommodates for approximately 200 guests and features an all-encompassing menu complete with breakfast, weekend brunch, lunch, afternoon tea, light snacks and dinner.', 'location' => '13-17 Dawson Street, Dublin','image' => 'TheIvy.jpg'],
            ]);
    }
}
