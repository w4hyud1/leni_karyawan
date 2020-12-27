WITH 
absensi_in AS (
	SELECT 
		nik
		, `date`
		, TIME AS time_in
		, '' AS time_out
		, activity AS activity_in
		, '' AS activity_out
		, remarks AS remarks_in
		, '' AS remarks_out 
	FROM absensi AS status_in WHERE `status`='IN'
)
, absensi_out AS (
	SELECT 
		nik
		, `date`
		, '' AS time_in
		, TIME AS time_out
		, '' AS activity_in
		, activity AS activity_out
		, '' AS remarks_in
		, remarks AS remarks_out
	FROM absensi AS status_in WHERE `status`='OUT'
)
, combain AS (
	SELECT * FROM absensi_in
	UNION ALL
	SELECT * FROM absensi_out
)
, coalesces AS (
	SELECT 
	nik
	, `date`
	, REPLACE( GROUP_CONCAT(time_in),',','') AS time_in
	, REPLACE( GROUP_CONCAT(time_out),',','') AS time_out
	, GROUP_CONCAT(activity_in, activity_out) AS activity
	, GROUP_CONCAT(remarks_in, remarks_out) AS remarks
	/*, case
	      when if(time_in)== '') then 'Lupa Absen Datang'
	      WHEN IF(time_out)== '') THEN 'Lupa Absen Pulang'
	      else ''
	      end as command*/
	FROM combain GROUP BY nik, DATE
)
SELECT * FROM coalesces ORDER BY nik,`date`