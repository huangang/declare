<?php

namespace App\Admin\Extensions;

use Encore\Admin\Grid\Exporters\AbstractExporter;
use DB;
class CustomExporter extends AbstractExporter
{
	public function export()
	{
		$needs = ['id','project.name','user.name','title','body','tutor','user.student_no','user.mobile'];
		$filename = $this->getTable().'.csv';
		$titles =['编号','作品名称','作品描述','指导老师','所属项目','提交用户','学号','联系方式'];
		// 这里获取数据
		$data = $this->getData();
		//dd($data);
		// 根据上面的数据拼接出导出数据，
		$output = self::putcsv($titles);

		//dd($array);
		foreach ($data as $row) {
			$row = array_dot($row);
			//dd($row);
			$row = array_only($row, $needs);
			//dd($row);
			$output .= self::putcsv($row);
		}

		// 在这里控制你想输出的格式,或者使用第三方库导出Excel文件
		$headers = [
			'Content-Encoding'    => 'UTF-8',
			'Content-Type'        => 'text/csv;charset=UTF-8',
			'Content-Disposition' => "attachment; filename=\"$filename\"",
		];

		// 导出文件，
		response(rtrim($output, "\n"), 200, $headers)->send();

		exit;
	}
	/**
	 * Remove indexed array.
	 *
	 * @param array $row
	 *
	 * @return array
	 */
	protected function sanitize(array $row)
	{
		return collect($row)->reject(function ($val) {
			return is_array($val) && !Arr::isAssoc($val);
		})->toArray();
	}
	/**
	 * @param $row
	 * @param string $fd
	 * @param string $quot
	 * @return string
	 */
	protected static function putcsv($row, $fd = ',', $quot = '"')
	{
		$str = '';
		foreach ($row as $cell) {
			$cell = str_replace([$quot, "\n"], [$quot . $quot, ''], $cell);
			if (strchr($cell, $fd) !== FALSE || strchr($cell, $quot) !== FALSE) {
				$str .= $quot . $cell . $quot . $fd;
			} else {
				$str .= $cell . $fd;
			}
		}
		return substr($str, 0, -1) . "\n";
	}

}