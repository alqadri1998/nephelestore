<?php

namespace App\Http\Controllers\Admin;

use App\Backup;
use App\Http\Controllers\Controller;

class BackupController extends Controller {
	public function index() {
		$backups = Backup::paginate(10);
		return view('admin.pages.backup', compact('backups'));
	}

	public function store() {
		if (!file_exists(public_path('backups'))) {
			mkdir(public_path('backups'), 0777, true);
		}
		$name = 'nephele-backup-' . date('Y-m-d') . '_' . time();
		Backup::create(['name' => $name]);
		try {
			$excuteCommand = \Artisan::call('backup:mysql-dump ' . $name);
		} catch (Exception $e) {
			//
		}
		return redirect()->back()->with('message-success', t('Database Backup done Successfully', 'site'));
	}

	public function restore($id) {
		$backup = Backup::find($id);
		$filename = $backup->name;
		try {
			$artisan = base_path('artisan');
			$excuteCommand = exec('php ' . $artisan . ' backup:mysql-restore --yes --filename ' . $filename . '.sql');
			// $excuteCommand =  \Artisan::call('backup:mysql-restore --yes --filename ' . $filename . '.sql');
		} catch (Exception $e) {
			return $e->getMessage();
		}
		return redirect()->back()->with('message-success', t('Database Restore Completed Successfully', 'site'));
	}
	public function delete($id) {
		$backup = Backup::find($id);
		$filename = public_path('backups') . '/' . $backup->name . '.sql';
		try {
			Backup::where('id', $id)->delete();
			@unlink($filename);
		} catch (Exception $e) {
			return $e->getMessage();
		}
		return redirect()->back()->with('message-success', __('admin.messages.removed Successfull'));

	}
}
