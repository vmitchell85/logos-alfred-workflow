import alfy from 'alfy';
import sqlite3 from 'sqlite3';
import fs from 'fs';
import os from 'os';

var dbPath = getDbPath();

var db = new sqlite3.Database(dbPath);

db.all(`
    SELECT
        Title,
        ResourceId,
        Authors
    FROM
        Records
    WHERE
        ResourceDriverName = 'logos' AND
        Availability >= 1 AND
        Title LIKE '%${alfy.input}%' OR
        UserTitle LIKE '%${alfy.input}%' OR
        UserAbbreviatedTitle LIKE '%${alfy.input}%' OR
        AbbreviatedTitle LIKE '%${alfy.input}%' OR
        ResourceId LIKE '%${alfy.input}%'
    ORDER BY
        LastAccessedUtc DESC
    `, function (err, rows) {
    alfy.output(rows.map(function (row) {
        return {
            title: row.UserTitle || row.Title,
            subtitle: row.Authors,
            arg: row.ResourceId,
        }
    }));
});


function getDbPath() {
    const dataPath = `${os.homedir()}/Library/Application Support/Logos4/Data`;

    var folder = fs.readdirSync(dataPath).find(f => {
        return fs.existsSync(`${dataPath}/${f}/LibraryCatalog/catalog.db`);
    });

    return `${dataPath}/${folder}/LibraryCatalog/catalog.db`;
}