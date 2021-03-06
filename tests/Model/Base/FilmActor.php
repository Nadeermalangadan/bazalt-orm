<?php

namespace tests\Model\Base;

/**
 * @codeCoverageIgnore
 */
abstract class FilmActor extends Record
{
    const TABLE_NAME = 'film_actor';

    const MODEL_NAME = 'tests\Model\FilmActor';

    public function __construct()
    {
        parent::__construct(self::TABLE_NAME, self::MODEL_NAME);
    }

    protected function initFields()
    {
        $this->hasColumn('actor_id', 'PU:smallint(5)');
        $this->hasColumn('film_id', 'PU:smallint(5)');
        $this->hasColumn('last_update', 'timestamp|CURRENT_TIMESTAMP');
    }

    public function initRelations()
    {
        $this->hasRelation('Actor', new \Bazalt\ORM\Relation\One2One('tests\Model\Actor', 'actor_id',  'actor_id'));
        $this->hasRelation('Film', new \Bazalt\ORM\Relation\One2One('tests\Model\Film', 'film_id',  'film_id'));
    }
}