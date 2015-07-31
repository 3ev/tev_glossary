#
# Table structure for table 'tx_tevglossary_domain_model_entry'
#

CREATE TABLE tx_tevglossary_domain_model_entry (
    uid int(11) unsigned NOT NULL auto_increment,
    pid int(11) unsigned DEFAULT '0' NOT NULL,
    crdate int(11) unsigned DEFAULT '0' NOT NULL,
    tstamp int(11) unsigned DEFAULT '0' NOT NULL,
    cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
    deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
    hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
    term varchar(255) DEFAULT '' NOT NULL,
    definition text NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY deleted (deleted),
    KEY hidden (hidden)
);
