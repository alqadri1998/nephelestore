<?php

namespace App\Http\Controllers;

use FastExcel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use PDF;
use Response;

class Controller extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public static function search(&$items, $request, array $fields, $hasTranslations = false) {
		if (isset($request['search']) && !empty($request['search'])) {
			foreach ($fields as $index => $field) {
				if ($index == 0) {
					$items->where($field, 'LIKE', '%' . $request['search'] . '%');
				} else {
					$items->orWhere($field, 'LIKE', '%' . $request['search'] . '%');
				}

			}
		}
	}
	public static function export($headers, $items, $title = '', $file = 'print', $sums = []) {
		$filename = self::generateRandomName() . $file . '.pdf';
		PDF::loadView('admin/prints/pdf', [
			'headers' => $headers,
			'items' => $items,
			'sums' => $sums,
			'title' => $title,
		], [], [
			'title' => $filename,
			'autoScriptToLang' => true,
			'margin_top' => 45,
			'margin_bottom' => 30,
			'autoLangToFont ' => true,
			'baseScript' => 1,
			'autoVietnamese' => true,
			'autoArabic' => true,
			'from' => 1,
			'reset' => 0,
			'type' => 'I',
			'suppress' => 'off',
			// 'orientation'=>''
		])->save(public_path('/uploads/pdf/' . $filename));
		return Response::download(public_path('/uploads/pdf/' . $filename));
	}

	public static function exportEx($items, $title = '', $fileType = 'xlsx') {
		$filename = $title . '-' . self::generateRandomName() . '.' . $fileType;
		$path = public_path('/uploads/excel/' . $filename);
		(new FastExcel($items))->export($path);
		return Response::download(public_path('/uploads/excel/' . $filename));
	}
	public static function generateRandomName() {
		return date('Y_m_d') . time();
	}
}
