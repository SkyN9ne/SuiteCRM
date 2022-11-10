<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */

$dictionary['InboundEmail'] = [
    'table' => 'inbound_email',
    'inline_edit' => false,
    'duplicate_merge' => false,
    'comment' => 'Inbound email parameters',
    'fields' => [
        'id' => [
            'name' => 'id',
            'vname' => 'LBL_ID',
            'type' => 'id',
            'dbType' => 'varchar',
            'len' => 36,
            'required' => true,
            'reportable' => false,
            'inline_edit' => false,
            'comment' => 'Unique identifier'
        ],
        'deleted' => [
            'name' => 'deleted',
            'vname' => 'LBL_DELETED',
            'type' => 'bool',
            'required' => false,
            'default' => '0',
            'reportable' => false,
            'inline_edit' => false,
            'comment' => 'Record deltion indicator'
        ],
        'date_entered' => [
            'name' => 'date_entered',
            'vname' => 'LBL_DATE_ENTERED',
            'type' => 'datetime',
            'required' => true,
            'inline_edit' => false,
            'comment' => 'Date record created'
        ],
        'date_modified' => [
            'name' => 'date_modified',
            'vname' => 'LBL_DATE_MODIFIED',
            'type' => 'datetime',
            'required' => true,
            'inline_edit' => false,
            'comment' => 'Date record last modified'
        ],
        'modified_user_id' => [
            'name' => 'modified_user_id',
            'rname' => 'user_name',
            'id_name' => 'modified_user_id',
            'vname' => 'LBL_MODIFIED_BY',
            'type' => 'modified_user_name',
            'table' => 'users',
            'isnull' => false,
            'dbType' => 'id',
            'reportable' => true,
            'inline_edit' => false,
            'comment' => 'User who last modified record'
        ],
        'modified_user_id_link' => [
            'name' => 'modified_user_id_link',
            'type' => 'link',
            'relationship' => 'inbound_email_modified_user_id',
            'vname' => 'LBL_MODIFIED_BY_USER',
            'link_type' => 'one',
            'module' => 'Users',
            'bean_name' => 'User',
            'source' => 'non-db',
            'inline_edit' => false,
        ],
        'created_by' => [
            'name' => 'created_by',
            'rname' => 'user_name',
            'id_name' => 'modified_user_id',
            'vname' => 'LBL_ASSIGNED_TO',
            'type' => 'assigned_user_name',
            'table' => 'users',
            'isnull' => false,
            'dbType' => 'id',
            'inline_edit' => false,
            'comment' => 'User who created record'
        ],
        'owner_name' => [
            'name' => 'owner_name',
            'rname' => 'name',
            'id_name' => 'created_by',
            'vname' => 'LBL_OWNER_NAME',
            'join_name' => 'owner_user',
            'type' => 'relate',
            'link' => 'created_by_link',
            'table' => 'users',
            'isnull' => 'true',
            'module' => 'Users',
            'dbType' => 'varchar',
            'len' => '255',
            'source' => 'non-db',
            'unified_search' => true,
            'inline_edit' => false,
        ],
        'created_by_link' => [
            'name' => 'created_by_link',
            'type' => 'link',
            'relationship' => 'inbound_email_created_by',
            'vname' => 'LBL_CREATED_BY_USER',
            'link_type' => 'one',
            'module' => 'Users',
            'bean_name' => 'User',
            'source' => 'non-db',
            'inline_edit' => false,
        ],
        'name' => [
            'name' => 'name',
            'vname' => 'LBL_NAME',
            'type' => 'varchar',
            'len' => '255',
            'required' => false,
            'reportable' => false,
            'inline_edit' => false,
            'comment' => 'Name given to the inbound email mailbox'
        ],
        'status' => [
            'name' => 'status',
            'vname' => 'LBL_STATUS',
            'type' => 'enum',
            'options' => 'dom_inbound_email_account_status',
            'len' => 100,
            'default' => 'Active',
            'required' => true,
            'reportable' => false,
            'inline_edit' => false,
            'comment' => 'Status of the inbound email mailbox (ex: Active or Inactive)'
        ],
        'server_url' => [
            'name' => 'server_url',
            'vname' => 'LBL_SERVER_URL',
            'type' => 'varchar',
            'len' => '100',
            'required' => true,
            'reportable' => false,
            'inline_edit' => false,
            'comment' => 'Mail server URL',
            'importable' => 'required',
        ],
        'email_user' => [
            'name' => 'email_user',
            'vname' => 'LBL_LOGIN',
            'type' => 'varchar',
            'len' => '100',
            'required' => true,
            'reportable' => false,
            'inline_edit' => false,
            'comment' => 'User name allowed access to mail server'
        ],
        'email_password' => [
            'name' => 'email_password',
            'vname' => 'LBL_PASSWORD',
            'type' => 'password',
            'dbType' => 'varchar',
            'display' => 'writeonly',
            'len' => '100',
            'required' => false,
            'reportable' => false,
            'inline_edit' => false,
            'sensitive' => true,
            'api-visible' => false,
            'comment' => 'Password of user identified by email_user'
        ],
        'port' => [
            'name' => 'port',
            'vname' => 'LBL_SERVER_PORT',
            'type' => 'int',
            'len' => '5',
            'default' => '143',
            'required' => true,
            'reportable' => false,
            'inline_edit' => false,
            'validation' => ['type' => 'range', 'min' => '110', 'max' => '65535'],
            'comment' => 'Port used to access mail server'
        ],
        'service' => [
            'name' => 'service',
            'vname' => 'LBL_SERVICE',
            'type' => 'varchar',
            'len' => '50',
            'required' => true,
            'reportable' => false,
            'inline_edit' => false,
            'comment' => '',
            'importable' => 'required',
        ],
        'mailbox' => [
            'name' => 'mailbox',
            'vname' => 'LBL_MAILBOX',
            'type' => 'text',
            'required' => true,
            'reportable' => false,
            'inline_edit' => false,
            'comment' => ''
        ],
        'sentFolder' => [
            'name' => 'sentFolder',
            'vname' => 'LBL_SENT_FOLDER',
            'type' => 'varchar',
            'reportable' => false,
            'inline_edit' => false,
        ],
        'trashFolder' => [
            'name' => 'trashFolder',
            'vname' => 'LBL_TRASH_FOLDER',
            'type' => 'varchar',
            'reportable' => false,
            'inline_edit' => false,
        ],
        'delete_seen' => [
            'name' => 'delete_seen',
            'vname' => 'LBL_DELETE_SEEN',
            'type' => 'bool',
            'default' => '0',
            'reportable' => false,
            'massupdate' => '',
            'inline_edit' => false,
            'comment' => 'Delete email from server once read (seen)'
        ],
        'mailbox_type' => [
            'name' => 'mailbox_type',
            'vname' => 'LBL_MAILBOX_TYPE',
            'type' => 'varchar',
            'len' => '10',
            'reportable' => false,
            'inline_edit' => false,
            'comment' => ''
        ],
        'template_id' => [
            'name' => 'template_id',
            'vname' => 'LBL_AUTOREPLY',
            'type' => 'id',
            'len' => '36',
            'reportable' => false,
            'inline_edit' => false,
            'comment' => 'Template used for auto-reply'
        ],
        'stored_options' => [
            'name' => 'stored_options',
            'vname' => 'LBL_STORED_OPTIONS',
            'type' => 'text',
            'reportable' => false,
            'inline_edit' => false,
            'comment' => ''
        ],
        'group_id' => [
            'name' => 'group_id',
            'vname' => 'LBL_GROUP_ID',
            'type' => 'id',
            'reportable' => false,
            'inline_edit' => false,
            'comment' => 'Group ID (unused)'
        ],
        'is_personal' => [
            'name' => 'is_personal',
            'vname' => 'LBL_IS_PERSONAL',
            'type' => 'bool',
            'required' => true,
            'default' => '0',
            'reportable' => false,
            'inline_edit' => false,
            'massupdate' => '',
            'comment' => 'Personal account flag'
        ],
        'groupfolder_id' => [
            'name' => 'groupfolder_id',
            'vname' => 'LBL_GROUPFOLDER_ID',
            'type' => 'id',
            'required' => false,
            'reportable' => false,
            'inline_edit' => false,
            'comment' => 'Unique identifier'
        ],
        'type' => [
            'name' => 'type',
            'vname' => 'LBL_TYPE',
            'type' => 'enum',
            'options' => 'dom_inbound_email_account_types',
            'display' => 'readonly',
            'inline_edit' => false,
            'reportable' => false,
        ],
        'protocol' => [
            'name' => 'protocol',
            'vname' => 'LBL_PROTOCOL',
            'type' => 'enum',
            'options' => 'dom_email_server_type',
            'function' => 'getInboundEmailProtocols',
            'default' => 'imap',
            'inline_edit' => false,
            'reportable' => false,
        ],
        'is_ssl' => [
            'name' => 'is_ssl',
            'vname' => 'LBL_SSL',
            'type' => 'bool',
            'required' => false,
            'default' => '0',
            'reportable' => false,
            'inline_edit' => false,
        ],
        'is_default' => [
            'name' => 'is_default',
            'vname' => 'LBL_IS_DEFAULT',
            'type' => 'bool',
            'required' => false,
            'default' => '0',
            'reportable' => false,
            'inline_edit' => false,
            'source' => 'non-db',
        ],
        'from_name' => [
            'name' => 'from_name',
            'vname' => 'LBL_FROM_NAME',
            'type' => 'varchar',
            'reportable' => false,
            'inline_edit' => false,
            'source' => 'non-db',
        ],
        'from_addr' => [
            'name' => 'from_addr',
            'vname' => 'LBL_FROM_ADDR',
            'type' => 'varchar',
            'reportable' => false,
            'inline_edit' => false,
            'source' => 'non-db',
        ],
        'reply_to_name' => [
            'name' => 'reply_to_name',
            'vname' => 'LBL_REPLY_TO_NAME',
            'type' => 'varchar',
            'reportable' => false,
            'inline_edit' => false,
            'source' => 'non-db',
        ],
        'reply_to_addr' => [
            'name' => 'reply_to_addr',
            'vname' => 'LBL_REPLY_TO_ADDR',
            'type' => 'varchar',
            'reportable' => false,
            'inline_edit' => false,
            'source' => 'non-db',
        ],
        'account_signature_id' => [
            'name' => 'account_signature_id',
            'vname' => 'LBL_SIGNATURE',
            'function' => [
                'name' => 'getUserSignature',
                'returns' => 'html',
                'include' => 'modules/InboundEmail/utils.php',
            ],
            'type' => 'varchar',
            'reportable' => false,
            'inline_edit' => false,
            'source' => 'non-db',
        ],
        'filter_domain' => [
            'name' => 'filter_domain',
            'vname' => 'LBL_FILTER_DOMAIN',
            'type' => 'varchar',
            'reportable' => false,
            'inline_edit' => false,
            'source' => 'non-db',
        ],
        'email_num_autoreplies_24_hours' => [
            'name' => 'email_num_autoreplies_24_hours',
            'vname' => 'LBL_MAX_AUTO_REPLIES',
            'type' => 'int',
            'reportable' => false,
            'inline_edit' => false,
            'source' => 'non-db',
        ],
        'is_auto_import' => [
            'name' => 'is_auto_import',
            'vname' => 'LBL_ENABLE_AUTO_IMPORT',
            'type' => 'bool',
            'required' => false,
            'default' => '0',
            'reportable' => false,
            'inline_edit' => false,
            'source' => 'non-db',
        ],
        'is_create_case' => [
            'name' => 'is_create_case',
            'vname' => 'LBL_CREATE_CASE',
            'type' => 'bool',
            'required' => false,
            'default' => '0',
            'reportable' => false,
            'inline_edit' => false,
            'source' => 'non-db',
        ],
        'allow_outbound_group_usage' => [
            'name' => 'allow_outbound_group_usage',
            'vname' => 'LBL_ALLOW_OUTBOUND_GROUP_USAGE',
            'type' => 'bool',
            'required' => false,
            'default' => '0',
            'reportable' => false,
            'inline_edit' => false,
            'source' => 'non-db',
        ],
        'distrib_method' => [
            'name' => 'distrib_method',
            'vname' => 'LBL_DISTRIB_METHOD',
            'type' => 'enum',
            'options' => 'dom_email_distribution_for_auto_create',
            'reportable' => false,
            'inline_edit' => false,
            'source' => 'non-db',
        ],
        'distribution_options' => [
            'name' => 'distribution_options',
            'vname' => 'LBL_DISTRIB_OPTIONS',
            'function' => [
                'name' => 'getInboundEmailDistributionOptions',
                'returns' => 'html',
                'include' => 'modules/InboundEmail/utils.php',
            ],
            'type' => 'varchar',
            'reportable' => false,
            'inline_edit' => false,
            'source' => 'non-db',
        ],
        'distribution_user' => [
            'name' => 'distribution_user',
            'type' => 'link',
            'relationship' => 'inbound_emails_distribution_user',
            'link_type' => 'one',
            'source' => 'non-db',
            'vname' => 'LBL_DISTRIBUTION_USER',
            'duplicate_merge' => 'disabled',
            'inline_edit' => false,
        ],
        'distribution_user_id' => [
            'name' => 'distribution_user_id',
            'rname' => 'id',
            'id_name' => 'distribution_user_id',
            'vname' => 'LBL_DISTRIBUTION_USER_ID',
            'type' => 'relate',
            'table' => 'users',
            'isnull' => 'true',
            'module' => 'Users',
            'dbType' => 'id',
            'reportable' => false,
            'massupdate' => false,
            'inline_edit' => false,
            'duplicate_merge' => 'disabled',
            'hideacl' => true,
        ],
        'distribution_user_name' => [
            'name' => 'distribution_user_name',
            'rname' => 'name',
            'id_name' => 'distribution_user_id',
            'vname' => 'LBL_DISTRIBUTION_USER_NAME',
            'join_name' => 'distribution_user',
            'type' => 'relate',
            'link' => 'distribution_user',
            'table' => 'users',
            'isnull' => 'true',
            'module' => 'Users',
            'dbType' => 'varchar',
            'len' => '255',
            'source' => 'non-db',
            'unified_search' => true,
            'inline_edit' => false,
        ],
        'outbound_email' => [
            'name' => 'outbound_email',
            'type' => 'link',
            'relationship' => 'inbound_outbound_email_accounts',
            'link_type' => 'one',
            'source' => 'non-db',
            'vname' => 'LBL_OUTBOUND_EMAIL_ACCOUNT',
            'duplicate_merge' => 'disabled',
            'inline_edit' => false,
        ],
        'outbound_email_id' => [
            'name' => 'outbound_email_id',
            'rname' => 'id',
            'id_name' => 'outbound_email_id',
            'vname' => 'LBL_OUTBOUND_EMAIL_ACCOUNT_ID',
            'type' => 'relate',
            'table' => 'outbound_email',
            'isnull' => 'true',
            'module' => 'OutboundEmailAccounts',
            'dbType' => 'id',
            'reportable' => false,
            'massupdate' => false,
            'duplicate_merge' => 'disabled',
            'hideacl' => true,
            'inline_edit' => false,
        ],
        'outbound_email_name' => [
            'name' => 'outbound_email_name',
            'rname' => 'name',
            'id_name' => 'outbound_email_id',
            'vname' => 'LBL_OUTBOUND_EMAIL_ACCOUNT_NAME',
            'join_name' => 'outbound_email',
            'type' => 'relate',
            'link' => 'outbound_email',
            'table' => 'outbound_email',
            'isnull' => 'true',
            'module' => 'OutboundEmailAccounts',
            'dbType' => 'varchar',
            'len' => '255',
            'source' => 'non-db',
            'unified_search' => true,
            'inline_edit' => false,
        ],
        'autoreply_email_template' => [
            'name' => 'autoreply_email_template',
            'type' => 'link',
            'relationship' => 'inbound_emails_autoreply_email_templates',
            'link_type' => 'one',
            'source' => 'non-db',
            'vname' => 'LBL_AUTOREPLY_EMAIL_TEMPLATE',
            'duplicate_merge' => 'disabled',
            'inline_edit' => false,
        ],
        'autoreply_email_template_name' => [
            'name' => 'autoreply_email_template_name',
            'rname' => 'name',
            'id_name' => 'template_id',
            'vname' => 'LBL_AUTOREPLY_EMAIL_TEMPLATE_NAME',
            'join_name' => 'email_templates',
            'type' => 'relate',
            'link' => 'autoreply_email_template',
            'table' => 'email_templates',
            'isnull' => 'true',
            'module' => 'EmailTemplates',
            'dbType' => 'varchar',
            'len' => '255',
            'source' => 'non-db',
            'unified_search' => true,
            'inline_edit' => false,
        ],
        'create_case_email_template' => [
            'name' => 'create_case_email_template',
            'type' => 'link',
            'relationship' => 'inbound_emails_case_email_templates',
            'link_type' => 'one',
            'source' => 'non-db',
            'vname' => 'LBL_CASE_EMAIL_TEMPLATE',
            'duplicate_merge' => 'disabled',
            'inline_edit' => false,
        ],
        'create_case_template_id' => [
            'name' => 'create_case_template_id',
            'rname' => 'id',
            'id_name' => 'create_case_template_id',
            'vname' => 'LBL_CASE_EMAIL_TEMPLATE_ID',
            'type' => 'relate',
            'table' => 'email_templates',
            'isnull' => 'true',
            'module' => 'EmailTemplates',
            'dbType' => 'id',
            'reportable' => false,
            'massupdate' => false,
            'duplicate_merge' => 'disabled',
            'hideacl' => true,
            'inline_edit' => false,
        ],
        'create_case_email_template_name' => [
            'name' => 'create_case_email_template_name',
            'rname' => 'name',
            'id_name' => 'create_case_template_id',
            'vname' => 'LBL_CASE_EMAIL_TEMPLATE_NAME',
            'join_name' => 'email_templates',
            'type' => 'relate',
            'link' => 'create_case_email_template',
            'table' => 'email_templates',
            'isnull' => 'true',
            'module' => 'EmailTemplates',
            'dbType' => 'varchar',
            'len' => '255',
            'source' => 'non-db',
            'unified_search' => true,
            'inline_edit' => false,
        ],
    ], /* end fields() */
    'indices' => [
        [
            'name' => 'inbound_emailpk',
            'type' => 'primary',
            'fields' => [
                'id'
            ]
        ],
    ], /* end indices */
    'relationships' => [
        'inbound_emails_distribution_user' => [
            'lhs_module' => 'Users',
            'lhs_table' => 'users',
            'lhs_key' => 'id',
            'rhs_module' => 'InboundEmail',
            'rhs_table' => 'inbound_email',
            'rhs_key' => 'distribution_user_id',
            'relationship_type' => 'one-to-many'
        ],
        'inbound_emails_autoreply_email_templates' => [
            'lhs_module' => 'EmailTemplates',
            'lhs_table' => 'email_templates',
            'lhs_key' => 'id',
            'rhs_module' => 'InboundEmail',
            'rhs_table' => 'inbound_email',
            'rhs_key' => 'template_id',
            'relationship_type' => 'one-to-many'
        ],
        'inbound_emails_case_email_templates' => [
            'lhs_module' => 'EmailTemplates',
            'lhs_table' => 'email_templates',
            'lhs_key' => 'id',
            'rhs_module' => 'InboundEmail',
            'rhs_table' => 'inbound_email',
            'rhs_key' => 'create_case_template_id',
            'relationship_type' => 'one-to-many'
        ],
        'inbound_outbound_email_accounts' => [
            'lhs_module' => 'OutboundEmailAccounts',
            'lhs_table' => 'outbound_emails',
            'lhs_key' => 'id',
            'rhs_module' => 'InboundEmail',
            'rhs_table' => 'inbound_email',
            'rhs_key' => 'outbound_email_id',
            'relationship_type' => 'one-to-many'
        ],
        'inbound_email_created_by' => [
            'lhs_module' => 'Users',
            'lhs_table' => 'users',
            'lhs_key' => 'id',
            'rhs_module' => 'InboundEmail',
            'rhs_table' => 'inbound_email',
            'rhs_key' => 'created_by',
            'relationship_type' => 'one-to-one'
        ],
        'inbound_email_modified_user_id' => [
            'lhs_module' => 'Users',
            'lhs_table' => 'users',
            'lhs_key' => 'id',
            'rhs_module' => 'InboundEmail',
            'rhs_table' => 'inbound_email',
            'rhs_key' => 'modified_user_id',
            'relationship_type' => 'one-to-one'
        ],
    ], /* end relationships */
];

VardefManager::createVardef('InboundEmail', 'InboundEmail', ['security_groups']);
