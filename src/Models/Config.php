<?php
/**
 * Tad CMS Tadcms\System\Models\Config
 *
 * @package    Theanh\Tadcms
 * @author     The Anh Dang <dangtheanh16@gmail.com>
 * @link       https://github.com/theanhk/tadcms
 * @license    MIT
 */

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Tadcms\System\Models\Config
 *
 * @property string $config_key
 * @property string|null $config_value
 * @method static \Illuminate\Database\Eloquent\Builder|Config newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config query()
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereConfigKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereConfigValue($value)
 * @mixin \Eloquent
 */
class Config extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'config_key';
    protected $keyType = 'string';
    
    protected $table = 'configs';
    protected $fillable = [
        'config_key',
        'config_value'
    ];
    
    /**
     * Get site config by key
     *
     * Return config value if exists or null if not exists
     * @param string $key
     * @param string|null $default
     * @return string|bool
     * */
    public static function getConfig($key, $default = null) {
        $config = Config::find($key);
        
        if ($config) {
            return $config->config_value;
        }
        
        return $default;
    }
    
    /**
     * Create or update config table by key
     *
     * @param string $key
     * @param string|null $value
     * @return \Tadcms\System\Models\Config|static
     * */
    public static function setConfig($key, $value = null) {
        return Config::updateOrCreate([
            'config_key' => $key
        ], [
            'config_value' => $value,
        ]);
    }
}
