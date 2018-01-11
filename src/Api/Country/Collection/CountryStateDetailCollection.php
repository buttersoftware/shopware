<?php declare(strict_types=1);

namespace Shopware\Api\Country\Collection;

use Shopware\Api\Country\Struct\CountryStateDetailStruct;
use Shopware\Api\Customer\Collection\CustomerAddressBasicCollection;
use Shopware\Api\Order\Collection\OrderAddressBasicCollection;
use Shopware\Api\Tax\Collection\TaxAreaRuleBasicCollection;

class CountryStateDetailCollection extends CountryStateBasicCollection
{
    /**
     * @var CountryStateDetailStruct[]
     */
    protected $elements = [];

    public function getCountries(): CountryBasicCollection
    {
        return new CountryBasicCollection(
            $this->fmap(function (CountryStateDetailStruct $countryState) {
                return $countryState->getCountry();
            })
        );
    }

    public function getTranslationIds(): array
    {
        $ids = [];
        foreach ($this->elements as $element) {
            foreach ($element->getTranslations()->getIds() as $id) {
                $ids[] = $id;
            }
        }

        return $ids;
    }

    public function getTranslations(): CountryStateTranslationBasicCollection
    {
        $collection = new CountryStateTranslationBasicCollection();
        foreach ($this->elements as $element) {
            $collection->fill($element->getTranslations()->getElements());
        }

        return $collection;
    }

    public function getCustomerAddressIds(): array
    {
        $ids = [];
        foreach ($this->elements as $element) {
            foreach ($element->getCustomerAddresses()->getIds() as $id) {
                $ids[] = $id;
            }
        }

        return $ids;
    }

    public function getCustomerAddresses(): CustomerAddressBasicCollection
    {
        $collection = new CustomerAddressBasicCollection();
        foreach ($this->elements as $element) {
            $collection->fill($element->getCustomerAddresses()->getElements());
        }

        return $collection;
    }

    public function getOrderAddressIds(): array
    {
        $ids = [];
        foreach ($this->elements as $element) {
            foreach ($element->getOrderAddresses()->getIds() as $id) {
                $ids[] = $id;
            }
        }

        return $ids;
    }

    public function getOrderAddresses(): OrderAddressBasicCollection
    {
        $collection = new OrderAddressBasicCollection();
        foreach ($this->elements as $element) {
            $collection->fill($element->getOrderAddresses()->getElements());
        }

        return $collection;
    }

    public function getTaxAreaRuleIds(): array
    {
        $ids = [];
        foreach ($this->elements as $element) {
            foreach ($element->getTaxAreaRules()->getIds() as $id) {
                $ids[] = $id;
            }
        }

        return $ids;
    }

    public function getTaxAreaRules(): TaxAreaRuleBasicCollection
    {
        $collection = new TaxAreaRuleBasicCollection();
        foreach ($this->elements as $element) {
            $collection->fill($element->getTaxAreaRules()->getElements());
        }

        return $collection;
    }

    protected function getExpectedClass(): string
    {
        return CountryStateDetailStruct::class;
    }
}