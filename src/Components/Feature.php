<?php

/*
 * This file is part of the lucid-console project.
 *
 * (c) Vinelab <dev@vinelab.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lucid\Console\Components;

/**
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
class Feature extends Component
{
    public function __construct($title, $file, $realPath, $relativePath, Service $service)
    {
        $this->setAttributes([
            'title' => $title,
            'service' => $service,
            'file' => $file,
            'realPath' => $realPath,
            'relativePath' => $relativePath,
        ]);
    }

    public function toArray()
    {
        $attributes = parent::toArray();

        // real path not needed
        unset($attributes['realPath']);

        // map the service object to its name
        $attributes['service'] = $attributes['service']->name;

        return $attributes;
    }
}
