# DBPROJECT
[데이터베이스 이론 및 실습] 
경희대학교 수강신청 시스템
### Index
- 기능을 한 눈에 보여주는 페이지
  - 회원가입 후 로그인 및 수강신청 페이지 접근
  - 학생
    - 수강신청과목 담기
    - 수강신청과목 검색
    - 수강신청과목 확인
  - 교수
    - 강의과목 수정
    - 강의과목 삭제
### SignUp
- GET으로 데이터 받아옴
  - $Name : 성함
  - $Department : 학과
  - $who : 교수(1) 혹은 학생(0)
  - $ID : DB에 저장될 ID
  - $Password : DB에 저장될 PW
=> P_PROFESSOR or P_STUDENT table에 회원가입 정보가 담긴 새로운 레코드 INSERT

### LogIn
- GET으로 데이터 받아옴
  - $who : 교수(1) 혹은 학생(0)
  - $ID : DB에 저장될 ID
  - $Password : DB에 저장될 PW
=> P_PROFESSOR or P_STUDENT table에서 해당 레코드가 유일하게 존재하면 수강신청 페이지 이동 버튼 반환

###ShowModify => ModifyCourse
- 교수로 로그인시 접근 가능한 담당강의 과목 내용 수정 페이지
- 교수ID로 P_COURSE Table에서 교수 담당과목데이터를 가져와 Table형태로 웹페이지에 반환
- 강의실, 강의시간, 수강가능정원만 수정 가능
=> P_COURSE table의 데이터 UPDATE

### ShowRegistration => Registration
- 이전 페이지(로그인페이지)의 ID, PW를 hidden 형태로 GET
- P_COURSE table과 수강신청 버튼을 웹페이지에 띄움
- 수강신청 버튼 클릭시
  1. P_REGISTRATION에 이미 같은 레코드가 있는지 확인
  2. P_REGISTRATION table에 신청내역 레코드 INSERT
  3. P_COURSE table의 선택된 레코드의 잔여인원(Remaining) 컬럼 값을 -1
  4. 현재시각 및 수강성공/실패 여부 웹페이지 반환

### ShowMyRegistration => MyRegistration
- 이전 페이지(로그인페이지)의 ID, PW를 hidden 형태로 GET
- P_COURSE table에서 학생정보와 일치하는 레코드만 LEFT JOIN하여 강의 전체정보를 웹페이지에 띄움
- 삭제버튼 클릭시
  1. P_REGISTRATION table에서 해당 수강신청내역 레코드 DELETE
  2. P_COURSE table에서 해당 레코드의 잔여인원(Remaining) 컬럼 값을 +1 
  3. 현재시각 및 삭제 성공/실패 여부 웹페이지 반환

### ShowSearch => SearchCourse
- 학수번호/교수명/이수구분/대상학년 중 한 번에 한가지 카테고리(컬럼)로만 검색 가능
- 전달받은 데이터와 일치하는 레코드만 SELECT
- P_PROFESSOR와 P_COURSE를 JOIN하여 강의 전체정보를 테이블 형태로 반환
- 검색 후 이동한 웹페이지에서도 수강신청 가능

### Professors
- 기말 프로젝트 평가자의 원활한 기능 접근을 위한 ID, PW 정보 제공
- DB에 미리 강의가 할당되어 등록된 상태인 가상의 교수자 ID, PW 명단을 index.html웹페이지 상에 테이블 형태로 반환

### 기타 원칙
- 모든 웹페이지에 로그인 페이지로 이동할 수 있는 컴포넌트를 띄워놓아야함
- 로그인 이후로 접속하는 모든 웹페이지는 다음 페이지에 접속자의 ID, PW를 넘겨주어야함
- 핵심 프로세스 수행 이전 if문으로 DB 접근이 성공적으로 이루어졌는지 꼭 확인해야함
- 사용자가 입력시 주의해야할 사항을 꼭 웹페이지 상에 상세하게 명시해야함
