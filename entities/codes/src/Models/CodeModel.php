<?php

namespace InetStudio\CodesPackage\Codes\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use InetStudio\ACL\Users\Models\Traits\HasUser;
use InetStudio\Classifiers\Models\Traits\HasClassifiers;
use InetStudio\CodesPackage\Codes\Contracts\Models\CodeModelContract;
use InetStudio\AdminPanel\Base\Models\Traits\Scopes\BuildQueryScopeTrait;

/**
 * Class CodeModel.
 */
class CodeModel extends Model implements CodeModelContract
{
    use Auditable;
    use SoftDeletes;
    use HasClassifiers;
    use BuildQueryScopeTrait;

    /**
     * Тип сущности.
     */
    const ENTITY_TYPE = 'code';

    /**
     * Should the timestamps be audited?
     *
     * @var bool
     */
    protected $auditTimestamps = true;

    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'codes';

    /**
     * Атрибуты, для которых разрешено массовое назначение.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'user_id',
    ];

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Загрузка модели.
     */
    protected static function boot()
    {
        parent::boot();

        self::$buildQueryScopeDefaults['columns'] = [
            'id',
            'code',
            'user_id',
        ];

        self::$buildQueryScopeDefaults['relations'] = [
            'user' => function ($query) {
                $query->select(['id', 'name', 'email']);
            },

            'classifiers' => function ($query) {
                $query->with(
                    [
                        'groups' => function ($query) {
                            $query->select(['id', 'name', 'alias']);
                        },
                    ]
                )->select(['classifiers_entries.id', 'classifiers_entries.value', 'classifiers_entries.alias']);
            },
        ];
    }

    /**
     * Сеттер атрибута code.
     *
     * @param $value
     */
    public function setCodeAttribute($value): void
    {
        $this->attributes['code'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута user_id.
     *
     * @param $value
     */
    public function setUserIdAttribute($value): void
    {
        $this->attributes['user_id'] = (int) trim(strip_tags($value));
    }

    /**
     * Геттер атрибута type.
     *
     * @return string
     */
    public function getTypeAttribute(): string
    {
        return self::ENTITY_TYPE;
    }

    use HasUser;
}
