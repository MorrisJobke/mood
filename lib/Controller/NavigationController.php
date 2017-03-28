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

namespace OCA\Socialcloud\Controller;

use \OCA\Socialcloud\Service\MiscService;
use \OCA\Socialcloud\Service\ConfigService;
use OC\AppFramework\Http;
use OCA\Socialcloud\Service\MoodService;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IRequest;

class NavigationController extends Controller {

	/** @var string */
	private $userId;
	/** @var IL10N */
	private $l10n;
	/** @var MoodService */
	private $moodService;
	/** @var MiscService */
	private $miscService;

	public function __construct(
		$appName,
		IRequest $request,
		$userId,
		IL10N $l10n,
		MoodService $moodService,
		MiscService $miscService
	) {
		parent::__construct($appName, $request);

		$this->userId = $userId;
		$this->l10n = $l10n;
		$this->moodService = $moodService;
		$this->miscService = $miscService;
	}


	/**
	 * @NoAdminRequired
	 *
	 * @param $type
	 * @param $entry
	 * @param $shares
	 *
	 * @return DataResponse
	 */
	public function createMood($data, $shares) {

		try {
			$result = $this->moodService->createMood($data, $shares);

			return self::success(['data' => $data, 'result' => $result]);
		} catch (\Exception $e) {
			$error = $e->getMessage();
		}

		return self::fail(
			['data' => $data, 'error' => $error]
		);


	}


	/**
	 * @param $data
	 *
	 * @return DataResponse
	 */
	public static function fail($data) {
		return new DataResponse(
			array_merge($data, array('status' => 0)),
			Http::STATUS_NON_AUTHORATIVE_INFORMATION
		);
	}

	/**
	 * @param $data
	 *
	 * @return DataResponse
	 */
	public static function success($data) {
		return new DataResponse(
			array_merge($data, array('status' => 1)),
			Http::STATUS_CREATED
		);
	}


	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 *
	 * @return TemplateResponse
	 */
	public function navigate() {
		return new TemplateResponse(
			'socialcloud', 'navigate', []
		);
	}


}