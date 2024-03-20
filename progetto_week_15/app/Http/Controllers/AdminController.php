<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {

            return view('admin.admin', [
                'courses' => Course::all(),
                'users' => User::all()
            ]);
        }
        abort(403, "You're not admin");
    }


    public function admit(User $user, Course $course)
    {
        try {
            // Controllo sul numero massimo di iscritti
            $maxCapacity = $course->total_seats;
            $confirmedUserCount = $course->users()->wherePivot('status', 'confirmed')->count();
            $users = $course->users()->get(['users.*', 'course_bookings.status']);

            if ($confirmedUserCount >= $maxCapacity) {
                return response()->json([
                    'success' => false,
                    'message' => 'Course has reached maximum capacity for confirmed users',
                    'users' => $users,
                    'confirmed_user_count' => $confirmedUserCount,
                    'max_capacity' => $maxCapacity
                ]);
            }

            $user->courses()->updateExistingPivot($course->id, [
                'status' => 'confirmed',
                'created_at' => $course->created_at,
                'updated_at' => now()
            ]);


            $confirmedUserCount = $course->users()->wherePivot('status', 'confirmed')->count();


            $updatedUsers = $course->users()->get(['users.*', 'course_bookings.status']);

            // Restituisci una risposta JSON con il risultato dell'operazione, i nuovi dati degli utenti e il numero attuale di iscritti confermati
            return response()->json([
                'success' => true,
                'message' => "$user->name accepted for course $course->name!",
                'users' => $updatedUsers,
                'confirmed_user_count' => $confirmedUserCount,
                'max_capacity' => $maxCapacity
            ]);
        } catch (\Exception $e) {
            // Se si verifica un'eccezione, restituisci una risposta JSON con un messaggio di errore
            return response()->json(['success' => false, 'message' => "An error occurred while accepting user"]);
        }
    }


    public function reject(User $user, Course $course)
    {
        try {
            // Controllo sul numero massimo di iscritti
            $maxCapacity = $course->total_seats;
            $confirmedUserCount = $course->users()->wherePivot('status', 'confirmed')->count();
            $users = $course->users()->get(['users.*', 'course_bookings.status']);

            if ($confirmedUserCount >= $maxCapacity) {
                return response()->json([
                    'success' => false,
                    'message' => 'Course has reached maximum capacity for confirmed users',
                    'users' => $users,
                    'confirmed_user_count' => $confirmedUserCount,
                    'max_capacity' => $maxCapacity
                ]);
            }

            $user->courses()->updateExistingPivot($course->id, [
                'status' => 'cancelled',
                'created_at' => $course->created_at,
                'updated_at' => now()
            ]);
            $confirmedUserCount = $course->users()->wherePivot('status', 'confirmed')->count();

            $updatedUsers = $course->users()->get(['users.*', 'course_bookings.status']);

            // Restituisci una risposta JSON con il risultato dell'operazione, i nuovi dati degli utenti e il numero attuale di iscritti confermati
            return response()->json([
                'success' => true,
                'message' => "$user->name rejected for course $course->name!",
                'users' => $updatedUsers,
                'confirmed_user_count' => $confirmedUserCount,
                'max_capacity' => $maxCapacity
            ]);
        } catch (\Exception $e) {
            // Se si verifica un'eccezione, restituisci una risposta JSON con un messaggio di errore
            return response()->json(['success' => false, 'message' => "An error occurred while rejecting user"]);
        }
    }

    public function reconsider(User $user, Course $course)
    {
        try {
            $maxCapacity = $course->total_seats;
            $confirmedUserCount = $course->users()->wherePivot('status', 'confirmed')->count();

            if ($confirmedUserCount >= $maxCapacity) {
                return response()->json(['success' => false, 'message' => 'Course has reached maximum capacity for confirmed users']);
            }

            $user->courses()->updateExistingPivot($course->id, [
                'status' => 'pending',
                'created_at' => $course->created_at,
                'updated_at' => now()
            ]);
            $confirmedUserCount = $course->users()->wherePivot('status', 'confirmed')->count();

            $updatedUsers = $course->users()->get(['users.*', 'course_bookings.status']);

            // Restituisci una risposta JSON con il risultato dell'operazione, i nuovi dati degli utenti e il numero attuale di iscritti confermati
            return response()->json([
                'success' => true,
                'message' => "$user->name reconsidered for course $course->name!",
                'users' => $updatedUsers,
                'confirmed_user_count' => $confirmedUserCount,
                'max_capacity' => $maxCapacity
            ]);
        } catch (\Exception $e) {
            // Se si verifica un'eccezione, restituisci una risposta JSON con un messaggio di errore
            return response()->json(['success' => false, 'message' => "An error occurred while reconsidering user"]);
        }
    }

    public function revoke(User $user, Course $course)
    {
        try {
            $maxCapacity = $course->total_seats;
            // $confirmedUserCount = $course->users()->wherePivot('status', 'confirmed')->count();
            // $updatedUsers = $course->users()->get(['users.*', 'course_bookings.status']);

            // if ($confirmedUserCount >= $maxCapacity) {
            //     return response()->json([
            //         'success' => true, 
            //         'message' => 'Course has reached maximum capacity for confirmed users',
            //         'users' => $updatedUsers,
            //         'confirmed_user_count' => $confirmedUserCount,
            //         'max_capacity' => $maxCapacity
            //     ]);
            // }

            $user->courses()->updateExistingPivot($course->id, [
                'status' => 'pending',
                'created_at' => $course->created_at,
                'updated_at' => now()
            ]);
            $confirmedUserCount = $course->users()->wherePivot('status', 'confirmed')->count();

            $updatedUsers = $course->users()->get(['users.*', 'course_bookings.status']);

            // Restituisci una risposta JSON con il risultato dell'operazione, i nuovi dati degli utenti e il numero attuale di iscritti confermati
            return response()->json([
                'success' => true,
                'message' => "$user->name reconsidered for course $course->name!",
                'users' => $updatedUsers,
                'confirmed_user_count' => $confirmedUserCount,
                'max_capacity' => $maxCapacity
            ]);
        } catch (\Exception $e) {
            // Se si verifica un'eccezione, restituisci una risposta JSON con un messaggio di errore
            return response()->json(['success' => false, 'message' => "An error occurred while reconsidering user"]);
        }
    }





    public function statistics()
    {


        $confirmedUsers = User::whereHas('courses', function ($query) {
            $query->where('course_bookings.status', 'confirmed');
        })->count();

        $pendingUsers = User::whereHas('courses', function ($query) {
            $query->where('course_bookings.status', 'pending');
        })->count();



        $cancelledUsers = User::whereHas('courses', function ($query) {
            $query->where('course_bookings.status', 'cancelled');
        })->count();

        $users = User::all();
        $courses = Course::all();
        $instructors = Instructor::all();


        $courseStatistics = [];
        foreach ($courses as $course) {
            if ($course->end_date >= Carbon::now()) {

                $totalSeats = $course->total_seats;

                $confirmedUsersCount = $course->users()->wherePivot('status', 'confirmed')->count();

                $totalRequestsCount = $course->users()->count();

                $courseStatistics[] = [
                    'course_name' => $course->name,
                    'total_seats' => $totalSeats,
                    'confirmed_users_count' => $confirmedUsersCount,
                    'total_requests_count' => $totalRequestsCount
                ];
            }
        }



        return view('admin.stats', [
            'users' => $users,
            'courses' => $courses,
            'confirmedUsers' => $confirmedUsers,
            'pendingUsers' => $pendingUsers,
            'cancelledUsers' => $cancelledUsers,
            'courseStatistics' => $courseStatistics,
            'instructors' => $instructors,
        ]);
    }



}
