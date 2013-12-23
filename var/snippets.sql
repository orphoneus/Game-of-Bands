-- Various useful SQL snippets

-- query that creates the  view_songs  view table

CREATE VIEW view_lyrics AS
SELECT song, GROUP_CONCAT(bandit) AS lyrics FROM contributions
WHERE category = 'lyrics'
GROUP BY song;

CREATE VIEW view_music AS
SELECT song, GROUP_CONCAT(bandit) AS music FROM contributions
WHERE category = 'music'
GROUP BY song;

CREATE VIEW view_vocals AS
SELECT song, GROUP_CONCAT(bandit) AS vocals FROM contributions
WHERE category = 'vocals'
GROUP BY song;

CREATE VIEW view_songs AS
SELECT id, name, url, round, votes, 
    view_lyrics.lyrics AS lyrics,
    view_music.music AS music,
    view_vocals.vocals AS vocals,
    musicvote, lyricsvote, vocalsvote, teamnumber, approved
FROM songs
JOIN view_lyrics ON songs.id = view_lyrics.song
JOIN view_music  ON songs.id = view_music.song
JOIN view_vocals ON songs.id = view_vocals.song;


