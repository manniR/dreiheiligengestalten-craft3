<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;

return [
	'endpoints' => [
		'api/portfolios'                   => [
			'elementType' => Entry::class,
			'criteria'    => [ 'section' => 'portfolio' ],
			'transformer' => function ( Entry $entry ) {
					$image = $entry->portfolioImages[0];
					$coverImage=[
						'src'   => $image->getUrl(),
						'w'     => $image->getWidth(),
						'h'     => $image->getHeight(),
						'title' => $image->title,
						'alt'   => $image->altText
					];

				$creators = [];
				//var_dump($entry->selectMember);
				foreach ( $entry->selectMember as $member ) {
					$creators[] = [ 'name' => $member->title, 'websiteUrl' => $member->websiteUrl ];
				}

				$categories = [];
				foreach ( $entry->portfolioCategories as $cat ) {
					$categories[] = $cat->title;
				}

				return [

					'title'       => $entry->title,
					'slug'        => $entry->slug,
					'url'         => $entry->url,
					'description' => $entry->portfolioText,
					'categories'  => $categories,
					'coverImage'      => $coverImage,
					'video' => $entry->video,
					'creators'    => $creators,
					'jsonUrl'     => UrlHelper::url( "api/portfolio/{$entry->id}.json" ),
				];
			},
		],
		'api/portfolio/<slug:{slug}>' => function ( $slug ) {
			return [
				'elementType' => Entry::class,
				'criteria'    => [ 'slug' => $slug, 'section' => 'portfolio' ],
				'one'         => true,
				'transformer' => function ( Entry $entry ) {
					$images = [];

				foreach ( $entry->portfolioImages as $image ) {
					$images[] = [
//						    'imageThumbUrl' => $image->getUrl('tumbnail'),
						'src'   => $image->getUrl(),
						'w'     => $image->getWidth(),
						'h'     => $image->getHeight(),
						'title' => $image->title,
						'alt'   => $image->altText
					];
				}
				$creators = [];
				//var_dump($entry->selectMember);
				foreach ( $entry->selectMember as $member ) {
					$creators[] = [ 'name' => $member->title, 'websiteUrl' => $member->websiteUrl ];
				}

				$categories = [];
				foreach ( $entry->portfolioCategories as $cat ) {
					$categories[] = $cat->title;
				}

				return [

					'title'       => $entry->title,
					'showIntroSlide' => $entry->showIntroSlide,
					'slug'        => $entry->slug,
					'url'         => $entry->url,
					'description' => $entry->portfolioText,
					'categories'  => $categories,
					'images'      => $images,
					'video'       => $entry->video,
					'creators'    => $creators,
					'jsonUrl'     => UrlHelper::url( "api/portfolio/{$entry->id}.json" ),
				];


				},
			];
		},

		'api/members' => [
			'elementType' => Entry::class,
			'criteria'    => [ 'section' => 'members' ],
			'transformer' => function ( Entry $entry ) {

				return [
					'title'      => $entry->title,
					'websiteUrl' => $entry->websiteUrl,
					'email'      => $entry->email,
					'jsonUrl'    => UrlHelper::url( "api/members/{$entry->id}.json" ),
				];
			}
		]


	],
];

