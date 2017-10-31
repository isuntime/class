票据管理

设计需要
打印记录票据

票据作废（涉及到操作回流 退回）

数据库表单

table voucher_type 票据类型表
二级表三个字段 支付 收入 名称
system_id  type_name l_id
例如
	支出 (退学费，退考费)
	收入 (学费、考试费、资料费、制证费)
table voucher 票据记录表
system_id （编号）
order_id 订单编号
voucher_state 票据状态 正常_退款
voucher_type 票据类型
c_time 制表时间
c_number 制表编号
c_user 制表人
inser_time 填表时间
dorptime 作废时间
student_id 学员学号


学员报名

```````````
流程
->填写基本资料 -> 提交 - 自动分配学号并保存到数据库中
```````````

学员 缴纳学费 

````````````

````````````