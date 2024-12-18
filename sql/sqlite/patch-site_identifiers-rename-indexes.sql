-- This file is automatically generated using maintenance/generateSchemaChangeSql.php.
-- Source: sql/abstractSchemaChanges/patch-site_identifiers-rename-indexes.json
-- Do not modify this file directly.
-- See https://www.mediawiki.org/wiki/Manual:Schema_changes
CREATE TEMPORARY TABLE /*_*/__temp__site_identifiers AS
SELECT
  si_type,
  si_key,
  si_site
FROM /*_*/site_identifiers;
DROP TABLE /*_*/site_identifiers;


CREATE TABLE /*_*/site_identifiers (
    si_type BLOB NOT NULL,
    si_key BLOB NOT NULL,
    si_site INTEGER UNSIGNED NOT NULL,
    PRIMARY KEY(si_type, si_key)
  );
INSERT INTO /*_*/site_identifiers (si_type, si_key, si_site)
SELECT
  si_type,
  si_key,
  si_site
FROM
  /*_*/__temp__site_identifiers;
DROP TABLE /*_*/__temp__site_identifiers;

CREATE INDEX si_site ON /*_*/site_identifiers (si_site);

CREATE INDEX si_key ON /*_*/site_identifiers (si_key);
