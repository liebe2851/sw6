<head>
<link rel="stylesheet" href="global.css">
<meta charset='utf-8'>
</head>

<script>
    import {useForm, Hint, validators, minLength} from "svelte-use-form";
    const form=useForm();
</script>
    
    
<form use:form>
    <div class="main_pic_bg">
        <div class="city_edit"> 
            <h1>입출력 현황</h1>
            <p>입금 출금 현황을 조회할 수 있습니다.</p>
            <div class="mypage_box">
                    <div class="mypage_title">
                        <div class="reg_svc_list_title">
                            입출력 기록
                        </div>
                    </div>
                    <div class="table_box">
                        <table class="data_table">
                            <thead>
                                <tr>
                                    <th>번호</th>
                                    <th>그룹명</th>
                                    <th>입금</th>
                                    <th>출금</th>
                                    <th>O/X</th> <!-- 투표에서 실패하면 X 투표성공하면 O-->
                                </tr>
                            </thead>
                            <tbody id="mytable">

                            </tbody>
                        </table>
                    </div>
                <a class="test_manage_btn" href="/group.php">그룹 관리</a>

                
        </div>
    </div>
</form>
