<?php
/**
 * Tad CMS Tadcms\System\Models\Config
 *
 * @package    Tadcms\Tadcms
 * @author     The Anh Dang <dangtheanh16@gmail.com>
 * @link       https://github.com/tadcms/tadcms
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
    public static function getConfig($key, $default = null)
    {
        $config = Config::find($key, ['config_value']);
        
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
    public static function setConfig($key, $value = null)
    {
        return Config::updateOrCreate([
            'config_key' => $key
        ], [
            'config_value' => $value,
        ]);
    }
    
    public static function getConfigEmail()
    {
        $setting = Config::where('config_key','like','email_%')->get();
        if ($setting->isNotEmpty()) {
            $settingArray = $setting
                ->pluck('config_value','config_key')
                ->toArray();
            
            return array_merge([
                'email_setting' => null,
                'email_host' => null,
                'email_port' => null,
                'email_encryption' => null,
                'email_username' => null,
                'email_password' => null,
                'email_from_address' => null,
                'email_from_name' => null,
            ], $settingArray);
        }
        
        return null;
    }
}
