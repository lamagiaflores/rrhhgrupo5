<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $dni
 * @property $nombres
 * @property $apellidos
 * @property $telefono
 * @property $correo
 * @property $direccion
 * @property $id_departamento
 * @property $id_cargo
 * @property $fecha_ingreso
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Cargo $cargo
 * @property Departamento $departamento
 * @property Asistencia[] $asistencias
 * @property Contrato[] $contratos
 * @property Planilla[] $planillas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['dni', 'nombres', 'apellidos', 'telefono', 'correo', 'direccion', 'id_departamento', 'id_cargo', 'fecha_ingreso', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cargo()
    {
        return $this->belongsTo(\App\Models\Cargo::class, 'id_cargo', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departamento()
    {
        return $this->belongsTo(\App\Models\Departamento::class, 'id_departamento', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asistencias()
    {
        return $this->hasMany(\App\Models\Asistencia::class, 'id_empleado', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany(\App\Models\Contrato::class, 'id_empleado', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planillas()
    {
        return $this->hasMany(\App\Models\Planilla::class, 'id_empleado', 'id');
    }
    
}