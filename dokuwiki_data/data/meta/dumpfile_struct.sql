BEGIN TRANSACTION;
CREATE TABLE opts (opt,val);
INSERT INTO opts VALUES('dbversion',18);
CREATE TABLE sqlite_sequence(name,seq);
INSERT INTO sqlite_sequence VALUES('schemas',0);
CREATE TABLE types (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    class NOT NULL,
    ismulti BOOLEAN DEFAULT 0,
    label DEFAULT '',
    config DEFAULT ''
);
CREATE TABLE schema_cols (
    sid INTEGER REFERENCES "temp_schemas" (id),
    colref INTEGER NOT NULL,
    enabled BOOLEAN DEFAULT 1,
    tid INTEGER REFERENCES types (id),
    sort INTEGER NOT NULL,
    PRIMARY KEY ( sid, colref)
);
CREATE TABLE schema_assignments_patterns (
    pattern NOT NULL,
    tbl NOT NULL,
    PRIMARY KEY(pattern, tbl)
);
CREATE TABLE schema_assignments (
    pid NOT NULL,
    tbl NOT NULL,
    assigned BOOLEAN NOT NULL DEFAULT 1,
    PRIMARY KEY(pid, tbl)
);
CREATE TABLE titles (
    pid NOT NULL,
    title NOT NULL, lasteditor NOT NULL DEFAULT '', lastrev NOT NULL DEFAULT '', lastsummary NOT NULL DEFAULT '',
    PRIMARY KEY(pid)
);
INSERT INTO titles VALUES('start','World Housing Encyclopedia','',0,'');
INSERT INTO titles VALUES('sidebar','Index','',0,'');
INSERT INTO titles VALUES('about','Reports','',0,'');
INSERT INTO titles VALUES('addreport','Add new Report','',0,'');
CREATE TABLE schemas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    tbl,
    ts,
    
    user,
    comment,
    config NOT NULL DEFAULT '{}'
);
CREATE UNIQUE INDEX idx_opt ON opts(opt);
;
;
;
;
COMMIT;
