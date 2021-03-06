<?php
/**
 *  Copyright 2017-2018 Justin Dane D. Vallar
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 *
 */

namespace Vallarj\JsonApi\Schema;


interface ToOneRelationshipInterface
{
    /**
     * Set options of this specification.
     * @param array $options    Array that contains the options for this specification.
     */
    public function setOptions(array $options): void;

    /**
     * Gets the key of the relationship
     * @return string
     */
    public function getKey(): string;

    /**
     * Returns an array of FQCNs of the expected AbstractResourceSchema
     * @return array
     */
    public function getExpectedSchemas(): array;

    /**
     * Gets the object mapped by this relationship specification
     * @param mixed $parentObject   The target object to get the relationship object from
     * @return mixed
     */
    public function getObject($parentObject);

    /**
     * Sets the relationship object mapped by this specification
     * @param mixed $parentObject   The target object in which the relationship object will be set
     * @param mixed $object         The relationship object
     */
    public function setObject($parentObject, $object): void;

    /**
     * Clears the relationship mapped by this specification
     * @param mixed $parentObject   The target object in which the relationship will be cleared
     */
    public function clearObject($parentObject): void;

    /**
     * Returns true if relationship is readable
     * @return bool
     */
    public function isReadable(): bool;

    /**
     * Returns true if relationship is writable
     * @return bool
     */
    public function isWritable(): bool;

    /**
     * Returns ValidationResultInterface that represents the result of the validation
     * @param $id
     * @param $type
     * @param $context
     * @return ValidationResultInterface
     */
    public function isValid($id, $type, $context): ValidationResultInterface;

    /**
     * Returns true if validators should be run if value is null
     * @return bool
     */
    public function validateIfEmpty(): bool;

    /**
     * Returns true if attribute is required
     * @return bool
     */
    public function isRequired(): bool;
}