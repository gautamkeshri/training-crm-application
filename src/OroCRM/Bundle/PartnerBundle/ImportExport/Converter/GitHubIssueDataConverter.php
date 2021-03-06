<?php

namespace OroCRM\Bundle\PartnerBundle\ImportExport\Converter;

use Oro\Bundle\IntegrationBundle\ImportExport\DataConverter\AbstractTreeDataConverter;

class GitHubIssueDataConverter extends AbstractTreeDataConverter
{
    /**
     * {@inheritdoc}
     */
    protected function getHeaderConversionRules()
    {
        return [
            'id'         => 'remoteId',
            'number'     => 'number',
            'title'      => 'title',
            'body'       => 'description',
            'html_url'   => 'url',
            'state'      => 'status:id',
            'created_at' => 'createdAt',
            'updated_at' => 'updatedAt',
            'closed_at'  => 'closedAt',
            'assignee'   => 'assignedTo',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getBackendHeader()
    {
        return array_values($this->getHeaderConversionRules());
    }

    /**
     * {@inheritdoc}
     */
    protected function fillEmptyColumns(array $header, array $data)
    {
        $dataDiff = array_diff(array_keys($data), $header);
        $data = array_diff_key($data, array_flip($dataDiff));

        return parent::fillEmptyColumns($header, $data);
    }
}
