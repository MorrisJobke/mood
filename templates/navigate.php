<?php

/**
 * Social Cloud
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Maxence Lange <maxence@pontapreta.net>
 * @copyright 2017
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 */

script('socialcloud', 'social');

script('socialcloud', 'vendor/notyf');
style('socialcloud', 'notyf');

script('socialcloud', 'social.app.elements');
script('socialcloud', 'social.app.actions');
script('socialcloud', 'social.app.navigation');
script('socialcloud', 'social.app');

style('socialcloud', 'navigate');
?>


<div id="app-navigation">
	<div class="navigation-element">
		<input id="social_post" type="text" placeholder="<?php p($l->t('New mood')); ?>"/>
	</div>
	<div id="circles_list"></div>
</div>

<div id="app-content">
	<div id="emptycontent">
		<div class="icon-social"></div>
		<h2><?php p($l->t('No social cloud on the horizon')); ?></h2>
	</div>

	<div id="loading_members" class="icon-loading hidden"></div>
</div>
