
# List of Lists containing [Student_Name, Assignment_Score, Exam_Score]
raw_grades = [
    ["Amel", 78, 80],
    ["Dika", 78, 82],
    ["Nisrina", 57, 65],
    ["Nayla", 60, 70],
    ["Fatih", 77, 72],
    ["Rani", 68, 55],
]


# Function 1
def calculate_final_score(raw_grades):
    updated_data = []

    for student in raw_grades:
        final_score = (student[1] * 0.4) + (student[2] * 0.6)

        student.append(final_score)
        updated_data.append(student)

    return updated_data


# Function 2
def filter_students(updated_data):
    passed = []
    fail = []

    for student in updated_data:
        if student[2] >= 60 and student[3] >= 70:
            passed.append(student[0])
        else:
            fail.append(student[0])

    return {
        "passed": passed,
        "fail": fail
    }


# Menjalankan Function 1
all_update_data = calculate_final_score(raw_grades)

# Menjalankan Function 2
result = filter_students(all_update_data)


# Output Assignment 1 Nomor 1
print("1. All Update Data")
print(all_update_data)

print("\n2. Passed and Fail")
print(result)


# ============================================================
# NOMOR 2
# NIM GENAP → menggunakan Failed Students
# ============================================================

failed_tuple = tuple(result["fail"])

print("\nConverted Failed Students Tuple:")
print(failed_tuple)

print("\nVerified Data Type:")
print(type(failed_tuple))


# ============================================================
# NOMOR 3
# Menggunakan Passed Students
# ============================================================

passed_tuple = tuple(result["passed"])


def count_students_recursive(student_tuple, index):
    if index == 0:
        return 0
    return 1 + count_students_recursive(student_tuple, index - 1)


def verify_student(name, student_tuple):
    try:
        if name not in student_tuple:
            raise ValueError
    except ValueError:
        print(
            f"Error: Student name '{name}' not found in the passed list!"
        )
    else:
        print(f"Student Found '{name}'")


# Menghitung jumlah Passed Students
total_students = count_students_recursive(
    passed_tuple,
    3
)

print("\nTotal Number of Passed Students (Calculated Recursively):")
print(total_students)

print("-" * 60)

print("Scenario A")
verify_student("Amel", passed_tuple)

print("-" * 60)

print("Scenario B")
verify_student("Nisrina", passed_tuple)
