<?php
/**
 * NewChannel listener, will capture all incoming calls.
 *
 * PHP Version 5
 *
 * @category AsterTrace
 * @package  EventHandlers
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/ Apache License 2.0
 * @version  SVN: $Id$
 * @link     http://marcelog.github.com/
 *
 * Copyright 2011 Marcelo Gornstein <marcelog@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */
namespace AsterTrace\EventHandlers;

class NewChannelListener extends PDOListener
{
    public function onNewchannel($event)
    {
        $this->executeStatement($this->insertStatement, array(
            'uniqueid' => $event->getUniqueId(),
            'channel' => $event->getChannel(),
            'exten' => $event->getExtension(),
            'context' => $event->getContext(),
            'state' => $event->getChannelState(),
            'description' => $event->getChannelStateDesc(),
            'clid_num' => $event->getCallerIdNum(),
            'clid_name' => $event->getCallerIdName()
        ));
    }
}

