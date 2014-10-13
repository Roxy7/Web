<?php

/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. This software consists of voluntary contributions made by many individuals and is licensed under the MIT license. For more information, see <http://www.doctrine-project.org>.
 */
namespace Doctrine\ORM\Mapping;

/**
 * The default NamingStrategy
 *
 *
 * @link www.doctrine-project.org
 * @since 2.3
 * @author Fabio B. Silva <fabio.bat.silva@gmail.com>
 */
class DefaultNamingStrategy implements NamingStrategy {
	/**
	 *
	 * @ERROR!!!
	 *
	 */
	public function classToTableName($className) {
		if (strpos ( $className, '\\' ) !== false) {
			return substr ( $className, strrpos ( $className, '\\' ) + 1 );
		}
		
		return $className;
	}
	
	/**
	 *
	 * @ERROR!!!
	 *
	 */
	public function propertyToColumnName($propertyName, $className = null) {
		return $propertyName;
	}
	
	/**
	 *
	 * @ERROR!!!
	 *
	 */
	public function referenceColumnName() {
		return 'id';
	}
	
	/**
	 *
	 * @ERROR!!!
	 *
	 */
	public function joinColumnName($propertyName) {
		return $propertyName . '_' . $this->referenceColumnName ();
	}
	
	/**
	 *
	 * @ERROR!!!
	 *
	 */
	public function joinTableName($sourceEntity, $targetEntity, $propertyName = null) {
		return strtolower ( $this->classToTableName ( $sourceEntity ) . '_' . $this->classToTableName ( $targetEntity ) );
	}
	
	/**
	 *
	 * @ERROR!!!
	 *
	 */
	public function joinKeyColumnName($entityName, $referencedColumnName = null) {
		return strtolower ( $this->classToTableName ( $entityName ) . '_' . ($referencedColumnName ?  : $this->referenceColumnName ()) );
	}
}
