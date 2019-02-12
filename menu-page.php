<?php
/**
 * Template Name: Menu Page
 */
 ?>

<div class="container menu-container">
    <?php
        //this template is hardcoded for now for testing purposes
        // if ( have_posts() ) {
        //
        //     while ( have_posts() ) {
        //          the_post();
        //
        //          get_template_part( 'template-parts/content/content', 'page' );
        //     }
        // }
    ?>
    <article id="post-103" class="post-103 page type-page status-publish hentry">

        <header class="entry-header">
            <h1 class="entry-title">Menu</h1>
        </header>

        <div class="entry-content">

            <div class="wp-block-columns has-2-columns intro">
                <div class="wp-block-column">
                    <p>
                        Breakfast is available everyday from 7:00AM until 11:00AM and lunch from 11:00AM until 2:00PM.<br><br>
                        Dinner is available Wednesday to Saturday from 6:00PM til late, see our <a href="/location/#opening-hours">opening hours</a> for  more details.<br><br>
                        You can also <a href="/wp-content/uploads/2019/02/Simple-Dining-Menu.pdf" target="_blank">view</a> our menu in PDF format.
                    </p>
                </div>
                <div class="wp-block-column" id="dietary-requirements-legend">
                    <strong>Dietary Requirements</strong>
                    <dl>
                        <dt>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24">
                                <use xlink:href="<?php icons(); ?>#vegetarian"/>
                            </svg>
                        </dt>
                        <dd>
                            <span>Vegetarian or vegetarian options available.</span>
                        </dd>
                        <dt>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24">
                                <use xlink:href="<?php icons(); ?>#vegan"/>
                            </svg>
                        </dt>
                        <dd>
                            <span>Vegan or vegan options available.</span>
                        </dd>
                        <dt>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24">
                                <use xlink:href="<?php icons(); ?>#gluten-free"/>
                            </svg>
                        </dt>
                        <dd>
                            <span>Gluten free or gluten free options available.</span>
                        </dd>
                    </dl>
                </div>
            </div>
            <?php
                $menu_sections = [
                    'Breakfast' => [
                        'Fresh Bircher Muesli' =>[
                            'price' => '$10.00',
                            'img' => 'dose-juice-1184446-unsplash.jpg',
                            'desc' => 'Soaked overnight in Apple juice and manuka honey, served with fresh kiwifruit and strawberries.',
                            'diet' => [
                                'vegetarian',
                                'vegan'
                            ]
                        ],
                        'Avocado on Toast' => [
                            'price' => '$12.00',
                            'img' => 'wesual-click-1136560-unsplash.jpg',
                            'desc' => 'Sliced avocado on whole grain toast with a soft boiled egg on the side.',
                            'diet' => [
                                'vegetarian',
                                'gluten-free'
                            ]
                        ],
                        'Breakfast Waffles' => [
                            'price' => '$12.00',
                            'img' =>'taylor-kiser-373466-unsplash.jpg',
                            'desc' => 'Fresh waffles with spiced caramel cream, pistachios and walnuts.',
                            'diet' => [
                                'vegetarian',
                                'vegan'
                            ]
                        ],
                        'French Toast' => [
                            'price' => '$14.00',
                            'img' => 'toa-heftiba-243303-unsplash.jpg',
                            'desc' => 'Delicious French toast with strawberries, blueberries and a splash of cream.',
                            'diet' => [
                                'vegetarian',
                                'vegan',
                                'gluten-free'
                            ]
                        ],
                        'Kiwi Breakfast' => [
                            'price' => '$16.00',
                            'img' =>'andy-wang-658871-unsplash.jpg',
                            'desc' => 'Honey cured bacon, fried egg, sausage, baked beans, toast, grilled tomatoes and mushrooms.',
                            'diet' => [
                                'gluten-free'
                            ]
                        ],
                        'Fruit Platter' => [
                            'price' => '$16.00',
                            'img' =>'heather-ford-731018-unsplash.jpg',
                            'desc' => 'Seasonal fruit served with cinnamon toast, crackers and creamy Greek yogurt.',
                            'diet' => [
                                'vegetarian',
                                'vegan',
                                'gluten-free'
                            ]
                        ]
                    ],
                    'Lunch' => [
                        'Honey Soy Chicken Nibbles' =>[
                            'price' => '$10.00',
                            'img' => 'atharva-tulsi-682134-unsplash.jpg',
                            'desc' => 'Honey soy chicken nibbles with red onion salad and ranch dressing dipping sauce.',
                            'diet' => [
                                'gluten-free'
                            ]
                        ],
                        'Basil Pesto Salad' => [
                            'price' => '$12.00',
                            'img' => 'eaters-collective-132773-unsplash.jpg',
                            'desc' => 'Fresh basil pesto pasta salad, with cherry tomatoes on a bed of lettuce.',
                            'diet' => [
                                'vegetarian',
                                'vegan'
                            ]
                        ],
                        'Ham and Cheese Sandwich' =>[
                            'price' => '$14.00',
                            'img' => 'ola-mishchenko-600012-unsplash.jpg',
                            'desc' => 'Ham and cheese in toasted ciabata, accompanied with lettuce and capsicum.',
                            'diet' => [
                                'vegetarian',
                                'vegan'
                            ]
                        ],
                        'Lamb Salad' => [
                            'price' => '$14.00',
                            'img' =>'katherine-chase-493940-unsplash.jpg',
                            'desc' => 'Caramelised lamb chops and onions, served on a bed of mesclun and raspberries.',
                            'diet' => [
                                'gluten-free'
                            ]
                        ],
                        'Eggs Montreal' => [
                            'price' => '$14.00',
                            'img' => 'john-baker-349285-unsplash.jpg',
                            'desc' => 'Poached eggs and smoked salmon served on English muffins and topped with hollandaise sauce.',
                            'diet' => [
                                'vegetarian',
                                'gluten-free'
                            ]
                        ],
                        'Stuffed Aubergine' =>[
                            'price' => '$14.00',
                            'img' => 'mariana-medvedeva-561531-unsplash.jpg',
                            'desc' => 'Stuffed Aubergine topped with dairy free yogurt and coriander, served with a side of tomato and red onion salad.',
                            'diet' => [
                                'vegetarian',
                                'vegan',
                                'gluten-free'
                            ]
                        ],
                        'Cheese Burger' =>[
                            'price' => '$16.00',
                            'img' => 'avantgarde-concept-722928-unsplash.jpg',
                            'desc' => 'Homemade beef pattie with two slices of cheese and gherkins, served with a side of fries and onion rings.'
                        ]
                    ],
                    'Dinner' => [
                        'Three Bean Vege Open Sandwich' =>[
                            'price' => '$14.00',
                            'img' => 'ruth-reyer-1140155-unsplash.jpg',
                            'desc' => 'Homemade vegetable patties with sliced avocado served on wholemeal bread with a side of two colour zucchini salad.',
                            'diet' => [
                                'vegetarian',
                                'vegan',
                                'gluten-free'
                            ]
                        ],
                        'Mediterranean Salad' => [
                            'price' => '$14.00',
                            'img' => 'luiz-hansel-1159999-unsplash.jpg',
                            'desc' => 'Corn fritters and a selection of vegetables tossed in a Mediterranean dressing with a drizzling of Greek yogurt.',
                            'diet' => [
                                'vegetarian',
                                'vegan'
                            ]
                        ],
                        'Macaroni Cheese' => [
                            'price' => '$16.00',
                            'img' => 'ronaldo-de-oliveira-974000-unsplash.jpg',
                            'desc' => 'Creamy macaroni cheese with grilled tomatoes and topped with walnuts and microgreens.',
                            'diet' => [
                                'vegetarian'
                            ]
                        ],
                        'Barbeque Meatballs' => [
                            'price' => '$16.00',
                            'img' => 'the-creative-exchange-1309301-unsplash.jpg',
                            'desc' => 'Premium ground beef meatballs, slow cooked in barbeque sauce and served with spaghetti.'
                        ],
                        'Grilled Lemon Chicken' => [
                            'price' => '$18.00',
                            'img' =>'mark-deyoung-753346-unsplash.jpg',
                            'desc' => 'Chicken marinated in lemon sauce and then chargrilled with aubergine and served with steamed vegetables.',
                            'diet' => [
                                'gluten-free'
                            ]
                        ],
                        'Summer Rolls' => [
                            'price' => '$18.00',
                            'img' => 'ella-olsson-1128013-unsplash.jpg',
                            'desc' => 'Vietnamese style vegetable rolls, served with sesame dressing and garnished with mint leaves.',
                            'diet' => [
                                'vegetarian',
                                'vegan'
                            ]
                        ],
                        'Porterhouse Steak' => [
                            'price' => '$20.00',
                            'img' => 'krystel-encinares-1278051-unsplash.jpg',
                            'desc' => 'Premium chargrilled steak, served with grilled mushrooms, tomatoes, Brussels sprouts and pearl onions .',
                            'diet' => [
                                'gluten-free'
                            ]
                        ],
                        'Antipasto Platter' => [
                            'price' => '$30.00',
                            'img' => 'jessica-to-oto-o-1215762-unsplash.jpg',
                            'desc' => 'Suitable for two to three people. Our antipasto platter is a choice for those looking for something to nibble on while sharing a few drinks.'
                        ],
                    ],
                    'Desert' => [
                        'Blueberry Cheesecake' =>[
                            'price' => '$10.00',
                            'img' => 'mink-mingle-762115-unsplash.jpg',
                            'desc' => 'Homemade cheesecake, topped with blueberry compote.',
                            'diet' => [
                                'vegetarian'
                            ]
                        ],
                        'Tiramisu' => [
                            'price' => '$12.00',
                            'img' =>'cesar-vladimir-hernandez-sandoval-1153332-unsplash.jpg',
                            'desc' => 'Rich layered Italian desert, with berries and a side of chocolate gelato.',
                            'diet' => [
                                'vegetarian'
                            ]
                        ],
                        'Raspberry Pannacotta' => [
                            'price' => '$14.00',
                            'img' => 'mantra-media-58091-unsplash.jpg',
                            'desc' => 'Delicious raspberry pannacotta, served with a ring of fresh raspberries and garnished with crumbled cookies and mint.',
                            'diet' => [
                                'vegetarian',
                                'gluten-free'
                            ]
                        ],
                        'Pavlova' => [
                            'price' => '$16.00',
                            'img' => 'artur-rutkowski-581979-unsplash.jpg',
                            'desc' => 'Our signature desert dish! Beautiful pavlova with fresh raspberries, pomegranate seed and mint leaves.',
                            'diet' => [
                                'vegetarian'
                            ]
                        ],
                        'Fruit Platter' => [
                            'price' => '$16.00',
                            'img' =>'heather-ford-731018-unsplash.jpg',
                            'desc' => 'Seasonal fruit served with cinnamon toast, crackers and creamy Greek yogurt.',
                            'diet' => [
                                'vegetarian',
                                'vegan',
                                'gluten-free'
                            ]
                        ]
                    ]
                ];

                foreach( $menu_sections as $section_title => $section_items ){
                    include 'includes/menu-section.php';
                }

            ?>
        </div><!-- .entry-content -->
    </article>

</div>
