<?php

use Illuminate\Database\Seeder;
use App\Models\Variable;

class VariablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Variable::create([
            'name'  => 'Category',
            'key'   => 'category-text',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis mi eget erat dignissim temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis mi eget erat dignissim tempor',
        ]);

        Variable::create([
            'name'  => 'About Who We Are',
            'key'   => 'about-who-we-are',
            'value' => '<h3 style="text-align: center;"><strong>Lorem ipsum dolor sit amet</strong></h3><p style="text-align: center;">&nbsp;</p><p style="text-align: justify;"><span style="font-size: 14pt;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis libero vel tortor porta suscipit ut in urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer id interdum dolor. Suspendisse ac consectetur eros, sit amet eleifend libero. Mauris nec nulla sodales dolor blandit eleifend. Aliquam et libero accumsan, interdum est ac, aliquet mauris. Praesent eu metus vitae magna semper cursus. Curabitur sodales consectetur urna. Suspendisse feugiat tincidunt sapien at tincidunt. Maecenas a magna urna. Sed a interdum orci. Vestibulum arcu elit, faucibus quis lorem at, posuere sodales mi. Nam eget purus et justo vestibulum scelerisque eu auctor nisl. Aliquam finibus diam vel ex pellentesque, vitae tempus lectus rhoncus. Sed eget</span></p>'
        ]);

        Variable::create([
            'name'  => 'About What We Do',
            'key'   => 'about-what-we-do',
            'value' =>  '<p style="text-align: left;"><strong>Lorem ipsum dolor sit amet</strong></p><p style="text-align: left;">&nbsp;</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis libero vel tortor porta suscipit ut in urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer id interdum dolor. Suspendisse ac consectetur eros, sit amet eleifend libero. Mauris nec nulla sodales dolor blandit eleifend. Aliquam et libero accumsan, interdum est ac, aliquet mauris. Praesent eu metus vitae magna semper cursus. Curabitur sodales consectetur urna.</p>'
        ]);

        Variable::create([
            'name'  => 'About Our Team',
            'key'   => 'about-our-team',
            'value' => 'Our team how people get Legal help Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer id interdum dolor. Suspendisse ac consectetur eros, sit amet eleifend libero. Mauris nec nulla sodales dolor blandit eleifend. Aliquam et libero accumsan, interdum est ac, aliquet mauris. Praesent eu metus vitae magna semper cursus. Curabitur sodales consectetur urna.',
        ]);

        Variable::create([
            'name'  => 'Join Community',
            'key'   => 'join-community',
            'value' => '<p style="text-align: center;"><span style="font-size: 24px;">Join the community</span></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis libero vel tortor porta suscipit ut in urna. Vestibulum ante ipsum primis in faucibus orci luctus et</p>'
        ]);

        Variable::create([
            'name'  => 'Privacy Policy Header',
            'key'   => 'privacy-policy-header',
            'value' =>  'Privacy Policy'
        ]);

        Variable::create([
            'name'  => 'Privacy Policy Text',
            'key'   => 'privacy-policy-text',
            'value' =>  '<p style="text-align: center;"><span style="color: #212529; font-family: \'Open Sans\', sans-serif; font-size: 24px; font-weight: bold; background-color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span></p><p><span style="font-size: 22px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur libero quis sapien porta, vel posuere turpis placerat. Mauris non blandit turpis. Fusce vel elit nec nisl consectetur pulvinar. Suspendisse scelerisque, ipsum non luctus scelerisque, ligula metus posuere dolor, non feugiat augue libero at nisl. Fusce venenatis nisl non ligula malesuada varius. In sit amet commodo enim, vitae scelerisque justo. Ut a purus leo. Quisque non accumsan turpis, vitae volutpat sem. Nunc aliquet nulla sit amet mauris sollicitudin, sed dignissim dolor pretium. Sed tortor dolor, rhoncus eu odio ac, posuere aliquet lectus. Vivamus fermentum eros in pulvinar efficitur. Morbi vestibulum hendrerit malesuada. Sed eu risus ac lectus blandit scelerisque. Maecenas cursus ipsum ut sem varius tincidunt. Suspendisse ac urna quis metus suscipit tincidunt malesuada a ante.</span></p><p>&nbsp;</p><p><span style="font-size: 22px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span></p><p><span style="font-size: 22px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur libero quis sapien porta, vel posuere turpis placerat. Mauris non blandit turpis. Fusce vel elit nec nisl consectetur pulvinar. Suspendisse scelerisque, ipsum non luctus scelerisque, ligula metus posuere dolor, non feugiat augue libero at nisl. Fusce venenatis nisl non ligula malesuada varius. In sit amet commodo enim, vitae scelerisque justo. Ut a purus leo. Quisque non accumsan turpis, vitae volutpat sem. Nunc aliquet nulla sit amet mauris sollicitudin, sed dignissim dolor pretium. Sed tortor dolor, rhoncus eu odio ac, posuere aliquet lectus. Vivamus fermentum eros in pulvinar efficitur. Morbi vestibulum hendrerit malesuada. Sed eu risus ac lectus blandit scelerisque. Maecenas cursus ipsum ut sem varius tincidunt. Suspendisse ac urna quis metus suscipit tincidunt malesuada a ante.</span></p>'
        ]);
    }
}
