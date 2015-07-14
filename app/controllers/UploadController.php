<?php

namespace Controller; // you can defined your namespace;
use \Cp\Uploader;
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 7/14/15
 * Time: 1:54 PM
 */
class UploadController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $action = $this->request->getQuery('action','string');
        switch ($action) {
            case 'config':
                $result =  json_encode($this->ueditor->toArray());
                break;

            case 'uploadscrawl':
            case 'uploadimage':
                $config    = $this->ueditor->toArray();
                /***************************************************************
                 * you can also overite some configuration file just like:
                 * $config['imagePathFormat'] = $config['imagePathFormat'] . $userid;
                 *
                 *
                 ****************************************************************/
                $fieldName = $config['imageFieldName'];
                $up = new Uploader($fieldName, $config, 'upload');
                $result = json_encode($up->getFileInfo());
                break;
            case 'listfile':
                echo 'listfile';
                break;
            case 'listimage':
                $listconfig =$this->ueditor->toArray();

                $size  = isset($_GET['size']) ? htmlspecialchars($_GET['size']) : 20;
                $start = isset($_GET['start']) ? htmlspecialchars($_GET['start']) : 0;
                $end  = $start + $size;
                $allowFiles =  $listconfig['allowFiles'];
                $allowFiles = substr(str_replace(".", "|", join("", $allowFiles)), 1);

                $path = $_SERVER['DOCUMENT_ROOT'].DS.$listconfig['directlyPathFormat'];

                $files = $this->_getfiles($path);
                if (!count($files)) {
                    return json_encode(array(
                        "state" => "no match file",
                        "list" => array(),
                        "start" => $start,
                        "total" => count($files)
                    ));
                };

                /* 获取指定范围的列表 */
                $len = count($files);
                for ($i = min($end, $len) - 1, $list = array(); $i < $len && $i >= 0 && $i >= $start; $i--){
                    $list[] = $files[$i];
                }

                /* 返回数据 */
                $result = json_encode(array(
                    "state" => "SUCCESS",
                    "list" => $list,
                    "start" => $start,
                    "total" => count($files)
                ));

                break;

            default:
                $result = json_encode(array(
                    'state'=> 'there is a problem on request address'
                ));
                break;
        }

        if ($this->request->hasQuery('callback')) {
            if (preg_match("/^[\w_]+$/", $this->request->getQuery('callback','string'))) {
                echo $this->request->getQuery('callback','string') . '(' . $result . ')';
            } else {
                echo json_encode(array(
                    'state'=> 'callback is wrong'
                ));
            }
        } else {
            echo $result;
        }
    }

    private function _getfiles($path, &$files = array())
    {
        if (!is_dir($path)) return null;
        if(substr($path, strlen($path) - 1) != DS) $path .= DS;

        $handle = opendir($path);

        while (false !== ($file = readdir($handle))) {
            if ($file != '.' && $file != '..') {
                $path2 = $path . $file;
                if (is_dir($path2)) {
                    $this->_getfiles($path2, $files);
                } else {
                    //    if (preg_match("/\.(".$allowFiles.")$/i", $file)) {
                    $files[] = array(
                        'url'=> substr($path2, strlen($_SERVER['DOCUMENT_ROOT'].'/public')),
                        'mtime'=> filemtime($path2)
                    );
                    //    }
                }
            }
        }
        return $files;
    }

}
