<?php
/**
 *  This example shows how to fetch current champion information
 *    for one champion with ID 61.
 *
 *  Note: Fields name or title are normally not available with
 *    this request, this is only possible thanks to StaticData
 *    linking feature.
 */

//  Include init file
require __DIR__ . "/../_init.php";

use RiotAPI\RiotAPI;

$custom_api = new RiotAPI([
	RiotAPI::SET_KEY                => CFG_API_KEY,
	RiotAPI::SET_TOURNAMENT_KEY     => CFG_TAPI_KEY,
	RiotAPI::SET_REGION             => CFG_REGION,
	RiotAPI::SET_VERIFY_SSL         => CFG_VERIFY_SSL,

	//  This enables static data linking
	RiotAPI::SET_STATICDATA_LINKING => true,
]);

//  Make a call to RiotAPI
$ch = $custom_api->getChampionById(61);

?>

<table>
	<thead>
	<tr>
		<th>ID</th>
		<th>Name & Title</th>
		<th>Is active?</th>
		<th>Is playable in rankeds?</th>
		<th>Is F2P?</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td><?=$ch->id?></td>
		<td><?=$ch->name . ", " . $ch->title?></td>
		<td><?=$ch->active ? 'Yes' : 'No'?></td>
		<td><?=$ch->rankedPlayEnabled ? 'Yes' : 'No'?></td>
		<td><?=$ch->freeToPlay ? 'Yes' : 'No'?></td>
	</tr>
	</tbody>
</table>
