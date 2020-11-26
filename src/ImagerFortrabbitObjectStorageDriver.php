<?php
/**
 * Imager Fortrabbit Object Storage plugin for Craft CMS 3.x
 *
 * @link      https://workingconcept.com/
 * @copyright Copyright (c) 2018 Working Concept Inc.
 */

namespace workingconcept\imagerfortrabbitobjectstoragedriver;

use workingconcept\imagerfortrabbitobjectstoragedriver\externalstorage\FortrabbitObjectStorage;
use spacecatninja\imagerx\services\ImagerService;
use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;

use yii\base\Event;

/**
 * @author    Working Concept Inc.
 * @package   ImagerFortrabbitObjectStorageDriver
 * @since     1.0.0
 *
 */
class ImagerFortrabbitObjectStorageDriver extends Plugin
{
    public static $plugin;
    public $schemaVersion = '2.0.0';

    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(\spacecatninja\imagerx\ImagerX::class,
            \spacecatninja\imagerx\ImagerX::EVENT_REGISTER_EXTERNAL_STORAGES,
            static function (\spacecatninja\imagerx\events\RegisterExternalStoragesEvent $event) {
                $event->storages['fortrabbit'] = FortrabbitObjectStorage::class;
            }
        );
    }
}
