<?php
use craft\elements\Entry;
use craft\helpers\UrlHelper;
return [
	'endpoints' => [
		'api/portfolio.json' => [
			'elementType' => Entry::class,
			'criteria' => ['section' => 'portfolio'],
			'transformer' => function ( Entry $entry ) {

				$images = [];

				foreach ($entry->portfolioImages as $image){
						$images[] = [
//						    'imageThumbUrl' => $image->getUrl('tumbnail'),
							'src' => $image->getUrl(),
							'w' => $image->getWidth(),
							'h' => $image->getHeight(),
                            'title' => $image->title,
                            'alt' => $image->altText
						];
				}
				$creators = [];
				//var_dump($entry->selectMember);
				foreach ($entry->selectMember as $member)
					$creators[] = ['name' => $member->title, 'url' => $member->websiteUrl];

				$categories = [];
				foreach ($entry->portfolioCategories as $cat)
					$categories[] = $cat->title;

				return [

					       'title'   => $entry->title,
					       'url'     => $entry->url,
							'categories' => $categories,
							'images' => $images,
							'creators'	=> $creators,
					       'jsonUrl' => UrlHelper::url( "api/portfolio/{$entry->id}.json" ),
			       ];
			   },
		],
		'api/portfolio/<entryId:\d+>.json' => function ( $entryId ) {
			return [
				'elementType' => Entry::class,
				'criteria' => ['id' => $entryId, 'section' => 'portfolio'],
				'one' => true,
				'transformer' => function(Entry $entry) {
					$images = $entry->coverImage;
					return [
						'images' => $images->one()->getUrl('thumbnail'),
						'url' => $entry->url,
						'slug' => $entry->slug
						/* 'summary' => $entry->summary, */
						/* 'body' => $entry->body, */
					];
				},
			];
		},
	],
];

